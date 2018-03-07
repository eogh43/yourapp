<?php
class UsersEventListener{

    public function subscribe(\Illuminate\Events\Dispatcher $events){
        $events->listen(
            \App\Events\UserCreated::class,
            __CLASS__."@onUserCreated"
        );
    }

    public function onUserCreated(\App\Events\UserCreated $event){
        $user = $event->user;
        \Mail::send('emails.auth.confirm',compact('user'), function ($message) use($user){
            $message->to($user->email);
            $message->subject(
                sprintf('[%s] 회원가입을 확인해주세여', config('app.name'))
            );
        });
    }
}