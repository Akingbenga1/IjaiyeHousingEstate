@extends('layouts.main')

@section('division_container')
 <h3>  Password Reset </h3>
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
    
      <form action="{{ action('RemindersController@postRemind') }}" method="POST">
      Please enter your email address here:<br />
        <input type="email" name="useremail">
        {{Form::token()}}<br /><br />
        <input type="submit" value="Send Reminder">
      </form>
  
    </div>
@stop