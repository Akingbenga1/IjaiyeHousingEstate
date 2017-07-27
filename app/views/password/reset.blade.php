@extends('layouts.main')

@section('division_container')
 
 <h3>  Password Reset - Reset Page </h3>
    <div>
    @if(Session::has('status'))
    {{Session::get('status')}}
    <hr />
    <br/>
    @endif
    @if(Session::has('error'))
    {{Session::get('error')}}
    <hr />
    <br/>
    @endif
   
      <form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    Enter your email:<br />
    <input type="email" name="useremail"><br />
    Enter new password:<br />
    <input type="password" name="password"><br />
    Enter new password again:<br />
    <input type="password" name="password_confirmation"><br />
    <input type="submit" value="Reset Password">
</form>
  
    </div>
@stop