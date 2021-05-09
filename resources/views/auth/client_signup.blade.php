@extends('layouts.login')
<style>
    /* Hide all steps by default: */
    .tab {
        display: none;
    }

</style>
@section('content')
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            <img alt="Logo" src="{{ get_logo() }}" />
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">{{ _lang('Sign Up') }}!</h3>
                            <h4 class="kt-login__subtitle">{{ _lang('Sign up to use our features') }}.</h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                                &copy; {{ date('Y') . ' ' . get_option('company_name') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div
                    class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                    <div class="kt-login__head">
                        <span class="kt-login__signup-label">{{ _lang('Do you an account?') }}</span>&nbsp;&nbsp;
                        <a href="{{ url('login') }}" class="kt-link kt-login__signup-link">{{ _lang('Sign In') }}</a>
                    </div>

                    <!--begin::Body-->
                    <div class="kt-login__body">

                        <!--begin::Signin-->
                        <div class="kt-login__form">
                            @if (Session::has('error'))
                                <div class="alert alert-danger text-center">
                                    <strong>{{ session('error') }}</strong>
                                </div>
                            @endif

                            @if (Session::has('registration_success'))
                                <div class="alert alert-success text-center">
                                    <strong>{{ session('registration_success') }}</strong>
                                </div>
                            @endif

                            <!--begin::Form-->
                            <form method="POST" id="regForm" class="kt-form" autocomplete="off"
                                action="{{ url('register/client_signup') }}">
                                @csrf
                                <div class="tab">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="name" type="text" placeholder="{{ _lang('Business Name') }}"
                                                class="form-control{{ $errors->has('business_name') ? ' is-invalid' : '' }}"
                                                name="business_name" value="{{ old('business_name') }}"
                                                oninput="this.className = ''" required autofocus>

                                            @if ($errors->has('business_name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('business_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="name" type="text" placeholder="{{ _lang('Name') }}"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" value="{{ old('name') }}" oninput="this.className = ''"
                                                required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="email" type="email" placeholder="{{ _lang('E-Mail Address') }}"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" value="{{ old('email') }}" oninput="this.className = ''"
                                                required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select id="package"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="package" onchange="this.className = ''" required>
                                                <option value="">{{ _lang('Select Package') }}</option>
                                                {{ create_option('packages', 'id', 'package_name') }}
                                            </select>

                                            @if ($errors->has('package'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('package') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select id="package_type"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="package_type" onchange="this.className = ''" required>
                                                <option value="">{{ _lang('Select Package Type') }}</option>
                                                <option value="monthly">{{ _lang('Monthly Pack') }}</option>
                                                <option value="yearly">{{ _lang('Yearly Pack') }}</option>
                                            </select>

                                            @if ($errors->has('package_type'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('package_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="tab">
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <input id="password" type="password" placeholder="{{ _lang('Password') }}"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" oninput="this.className = ''" required>

                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="{{ _lang('Confirm Password') }}"
                                                name="password_confirmation" oninput="this.className = ''" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="kt-login__actions mt-3 text-right">
                                    <button class="btn btn-sm btn-outline-primary btn-elevate kt-login__btn-primary"
                                        type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn btn-sm btn-outline-primary btn-elevate kt-login__btn-primary"
                                        type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>

                                </div>
                            </form>
                            <!--end::Form-->

                        </div>
                        <!--end::Signin-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "{{ _lang('Sign Up') }}";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            /*  fixStepIndicator(n) */
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            return valid; // return the valid status
        }

    </script>
@endsection
