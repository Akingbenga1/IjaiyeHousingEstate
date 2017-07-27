@extends('layouts.main')

@section('division_container')


<h3>   Password Confirmed!!  </h3>
 you can login here:
 <hr /> <br />
   
      <div>
        @if(Session::has('LoginInfo'))
        {{Session::get('LoginInfo')}}
        @endif
    <form action="{{URL::route('login-details')}}" method="post">
        @if($errors->has('Email'))
            {{$errors->first('Email')}}
        @endif
        <br />
        Your Email: <input type="text" name="Email" 
        {{ (Input::old('LoginEmail')) ? ' value="'. e(Input::old('Email')) . '"' : '' }}  />
        <br />

        @if($errors->has('Password'))
        {{$errors->first('Password')}}
        @endif
        <br />
        Your Password: <input type="password" name="Password"   /><br />

        {{Form::token()}}
        <button type="submit" class=""> Sign in </button>

    </form>
     <a href="{{URL::route('password-reminder')}}" class="ButtonsLinks"> Forgot your password? </a>
  
    </div>
@stop