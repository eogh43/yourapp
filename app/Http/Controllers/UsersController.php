<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //회원가입 폼을 보여주는 메소드
    public function create(){

        return view('users.create');

    }

    //회원가입 요청시 처리해주는 메소드
    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $confirmCode = str_random(60);

        $user = \App\User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'confirm_code' => $confirmCode,
        ]);

//        \Mail::send('emails.auth.confirm', compact('user'), function ($message) use($user){
//            $message->to($user->email);
//            $message->subject(
//                sprintf('[%s] 회원가입을 확인해 주세요.', config('app.name'))
//            );
//        });
        event(new \App\Events\UserCreated($user));


//        flash('가입하신 메일 계정으로 가입 확인 메일을 보내드렸습니다. 가입확인하시고 로그인해봐~');
//        return redirect('/');
        return $this->respondCreated('가입하신 메일 계정으로 ~~~ 확인 바람');

    }

    protected function respondCreated($message){
        flash($message);
        return redirect('/');
    }

    public function confirm($code){

        $user = \App\User::whereConfirmCode($code)->first();

        if(!$user){
            flash('URL이 정확하지 않습니다');

            return redirect('/');
        }

        $user->activated =1;
        $user->confirm_code = null;
        $user->save();

        auth()->login($user);
        flash(auth()->user()->name.'님 환영합니다 가입 확인 됨');

        return redirect('home');


    }

    public function __cunstruct(){
        $this->middleware('guest');
    }
}
