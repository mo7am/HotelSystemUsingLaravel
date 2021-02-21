@extends('HomePageHotel.LayoutsHomePageHotel.appHomePageHotel')


@section('contentHomePageHotel')

    <div class="hero-wrap" style="background-image: url({{URL::asset('designHomePageHotel/images/bg_1.jpg')}});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{route('indexhome')}}">{{__('pageContent.home')}}</a></span> <span>{{__('pageContent.signup')}}</span></p>
	            <h1 class="mb-4 bread">{{__('pageContent.signup')}}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
         
         
         
          
        
            <div style="margin-left: 350px"  class="ml-md-6 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
             
                
                
                         <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            
                             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                <h1>{{__('pageContent.signup')}}</h1>
                        {{ csrf_field() }}
 <div class="cont_form_login">

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                           <p>
                                    <label for="username" class="uname" data-icon="u" > {{__('pageContent.email')}}</label>
                                <input id="username"   type="email"  name="email" value="{{ old('email') }}" required autofocus placeholder="{{__('pageContent.email')}}">
                                </p>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>
 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                              <p>
                                    <label for="password" class="youpasswd" data-icon="p"> {{__('pageContent.password')}} </label>
                                <input id="password"   type="password"  name="password" required placeholder="{{__('pageContent.password')}}">
                                 </p>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

                       

 <p class="keeplogin"> 
                                    <input type="checkbox" name="remember" id="loginkeeping" value="loginkeeping"   {{ old('remember') ? 'checked' : '' }}/> 
                                    <label for="loginkeeping">{{__('pageContent.remember')}}</label>
                                </p>

 <p class="login button"> 
                                    <input type="submit" value="{{__('pageContent.login')}}" onclick="cambiar_login()"/>
                                </p>
                       
                        

                               

                            <p class="change_link">
                                {{__('pageContent.notmember')}}
                                    <a style="margin-right: -30px" href="#toregister" class="to_register">{{__('pageContent.join')}}</a>

                                    <a style="margin-right: 500px ; margin-top: -60px" class="btn btn-link" href="">

                                        {{__('pageContent.Forgotpassword')}}
                                </a>
                                </p>
                       

  </div>
</form>
                        </div>

                        <div id="register" class="animate form">







  <form  class="form-horizontal" method="POST" action="{{ route('register') }}" autocomplete="on">
    {{ csrf_field() }}
                                <h1> {{__('pageContent.sign')}} </h1>
                 <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                   <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">{{__('pageContent.fname')}}</label>
                                    <input value="{{ old('fname') }}" id="usernamesignup" name="fname" required="required" type="text" placeholder="{{__('pageContent.fname')}}" />

                                     @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
<div class="form-group{{ $errors->has('mname') ? ' has-error' : '' }}">
                                 <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">{{__('pageContent.mname')}}</label>
                                    <input value="{{ old('mname') }}" id="usernamesignup" name="mname" required="required" type="text" placeholder="{{__('pageContent.mname')}}" />

                                     @if ($errors->has('mname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mname') }}</strong>
                                    </span>
                                @endif
                                </p>
</div>
<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                 <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">{{__('pageContent.lname')}}</label>
                                    <input value="{{ old('lname') }}" id="usernamesignup" name="lname" required="required" type="text" placeholder="{{__('pageContent.lname')}}" />

                                     @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > {{__('pageContent.email')}}</label>
                                    <input value="{{ old('email') }}" id="emailsignup" name="email" required="required" type="email" placeholder="mysupermail@mail.com"/> 

                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </p>
                            </div>
                 <div class="form-group{{ $errors->has('passwordsignup') ? ' has-error' : '' }}">
                                <p>
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">{{__('pageContent.password')}} </label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete=">{{__('pageContent.password')}}">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </p>
                            </div>
                     <div class="form-group{{ $errors->has('passwordsconfirm') ? ' has-error' : '' }}">
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">{{__('pageContent.confirmpassword')}} </label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="{{__('pageContent.confirmpassword')}}">

                                @if ($errors->has('passwordsconfirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('passwordsconfirm') }}</strong>
                                    </span>
                                @endif
                                </p>
</div>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                  <p> 
                                    <label  class="uname" >{{__('pageContent.identity')}} </label>
                                   <select value="{{ old('status') }}" name="status">
                                       <option value="2">{{__('pageContent.Receptionist')}}</option>
                                       <option value="3">{{__('pageContent.Acountant')}}</option>
                                       <option value="4">{{__('pageContent.Housekeaping')}}</option>
                                       <option value="5">{{__('pageContent.Cheif')}}</option>
                                       <option value="6">{{__('pageContent.localguest')}}</option>
                                       <option value="7">{{__('pageContent.foreignguist')}}</option>
                                   </select>
                                </p>
</div>

<p class="keeplogin"> 
                                    <input type="checkbox" name="remember" id="loginkeeping" value="loginkeeping"   {{ old('remember') ? 'checked' : '' }}/> 
                                    <label for="loginkeeping">{{__('pageContent.remember')}}</label>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"  onclick="cambiar_sign_up()"/> 
								</p>

                  <p class="signin button"> 
                   <a href="{{url('redirect/facebock')}}"> {{__('pageContent.withface')}} </a>
                </p>
                                <p class="change_link">
                                    {{__('pageContent.alreadymember')}}
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>


















                        </div>
						
                    </div>
                </div> 
                
                <br><br><br><br><br><br><br><br>
                
                
            </div>
          </div>
        </div>
       
      </div>
    </section>
    <br><br><br><br><br><br>
      @endsection
