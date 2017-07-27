<div class="LoginForm">
    <h3>Login </h3>
    <form action="{{URL::route('login-details')}}" method="post" class="col-md-6">  
    
             @if(Session::has('LoginInfo'))
             <div class="well bg-danger ">
                    <span  class="LoginError text-warning"> {{Session::get('LoginInfo')}}</span>
                    </div>
                 @endif
    
  
     @if($errors->has('Email'))
                        <span class="text-danger EmailError">{{$errors->first('Email')}}</span>
                    @endif

    <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Email" name="Email" aria-describedby="basic-addon1">
</div>

 @if($errors->has('Password'))
                            <span class="text-danger PasswordError">{{$errors->first('Password')}}</span>
                        @endif
<div class="input-group">
<span class="input-group-addon" id="basic-addon2"><i class="fa fa-key"></i></span>
  <input type="password" name="Password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
  
</div>

        
         <button type="submit" class="SignIn btn btn-default"> Sign in </button>
         <a href="{{URL::route('password-reminder')}}" class="ForgotLabel"> Forgot your password? </a>
         {{Form::token()}}
    </form>   
    
</div>