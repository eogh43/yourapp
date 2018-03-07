@extends('layouts.app')

@section('content')
    <form action="{{ route('users.store') }}" method="post" class="form_auth">
        {!! csrf_field() !!}

        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <input type="text" name="name" class="form-control" placeholder="이름" value="{{old('name')}}" autofocus/>
            {!!  $errors->first('name', '<span class="form-error">: message </span>') !!}
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            <input type="text" name="email" class="form-control" placeholder="email" value="{{old('email')}}" />
            {!!  $errors->first('name', '<span class="form-error">: message </span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <input type="password" name="password" class="form-control" placeholder="password" />
            {!!  $errors->first('name', '<span class="form-error">: message </span>') !!}
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
            <input type="password" name="password_confirmation" class="form-control" placeholder="password" />
            {!!  $errors->first('name', '<span class="form-error">: message </span>') !!}
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-lg btn-block" type="submit">
                Register
            </button>
        </div>

    </form>