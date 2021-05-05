@extends('layouts.login')

@section('content')
	<!-- begin:: Page -->
	<div class="kt-grid kt-grid--ver kt-grid--root">
		<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
				<!--begin::Aside-->
				<div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside">
					<div class="kt-grid__item">
						<a href="#" class="kt-login__logo">
           				<img alt="Logo" src="{{ get_logo() }}"/>
						</a>
					</div>
					<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
						<div class="kt-grid__item kt-grid__item--middle">
							<h3 class="kt-login__title">{{ _lang('Sign in') }}!</h3>
							<h4 class="kt-login__subtitle">{{ _lang('Sign in to your control panel') }}.</h4>
						</div>
					</div>
					<div class="kt-grid__item">
						<div class="kt-login__info">
							<div class="kt-login__copyright">
								&copy; {{ date('Y').' '.get_option('company_name') }}
							</div>
						</div>
					</div>
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                @if(get_option('allow_singup','yes') == 'yes')
                    <div class="kt-login__head">
                        <span class="kt-login__signup-label">{{ _lang('Still not having an account yet?')}}</span>&nbsp;&nbsp;
                        <a href="{{ url('register/client_signup') }}" class="kt-link kt-login__signup-link">{{ _lang('Sign Up') }}</a>
                    </div>
                @endif
					<!--begin::Body-->
					<div class="kt-login__body">

						<!--begin::Signin-->
						<div class="kt-login__form">
                            @if(Session::has('error'))
                                <div class="alert alert-danger text-center">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif
					
                            @if(Session::has('registration_success'))
                                <div class="alert alert-success text-center">
                                    <strong>{{ session('registration_success') }}</strong>
                                </div>
                            @endif

							<!--begin::Form-->
					        <form method="POST" class="kt-form" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ _lang('Email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">	

                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ _lang('Password') }}" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="text-left mt-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="remember">{{ _lang('Remember Me') }}</label>
                                    </div>
                                </div>
						
								<div class="kt-login__actions mt-3">
                                    <a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
									    {{ _lang('Forgot Password?') }}
                                    </a>
									<button type="submit" class="btn btn-primary btn-elevate kt-login__btn-primary">{{ _lang('Login') }}</button>
								</div>
							</form>
							<!--end::Form-->

                            @if(get_option('google_login') == 'enabled')
                                <!--begin::Divider-->
                                <div class="kt-login__divider">
                                    <div class="kt-divider">
                                        <span></span>
                                        <span>{{ _lang('OR')}}</span>
                                        <span></span>
                                    </div>
                                </div>
                                <!--end::Divider-->

                                <!--begin::Options-->
                                <div class="kt-login__options">
                                    <a href="{{ url('google/redirect') }}" class="btn btn-danger kt-btn">
                                        <i class="fab fa-google"></i>
                                        {{ _lang('Google') }}
                                    </a>
                                </div>
                                <!--end::Options-->
                            @endif

						</div>
						<!--end::Signin-->
					</div>
					<!--end::Body-->
				</div>
				<!--end::Content-->
			</div>
		</div>
	</div>
@endsection