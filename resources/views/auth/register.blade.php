<!DOCTYPE html>
<html>
    <head>
        <title>List Your Business for Free | Local Business Listing Directory</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index" />
        <meta name="title" content="List Your Business for Free | Local Business Listing Directory">
        <meta content="Register and list your business for free on Localbeings.com. Enhance your online visibility, reach local customers, and grow your business today!" name="description">
        @include('layouts.partials.headFront')
    </head>
    <body class="gray">
        <div class="clearfix"></div>
        <div id="main-wrapper" >
            <section style="padding: 5% 0">
                <div class="container">
                    <div class="row  align-items-start justify-content-center">
                        <div class="col-md-8">
                            <div class="text-center">
                                	<img src="{{asset('asset/img/logo.png')}}" class="logo" alt="" style="width: 280px" />
                                <h2>Register and List Your Business on Localbeings.com</h2>
                                <p>Welcome to Localbeings.com, your trusted local business listing site! If you're a business
                                    owner looking to increase your visibility and attract more customers, you've come to the
                                    right place. By listing your business in our comprehensive business directory, you can
                                    ensure that potential customers in your area find you easily.</p>
                            </div>
                            <div class="signup-screen-wrap">
								<div class="signup-screen-single">
									<div class="text-center mb-4">
										<h4 class="m-0 ft-medium">Register Your Account</h4>
									</div>
                                    <form class="submit-form" method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3 form-group">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="input-text  form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 form-group">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 form-group">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3 form-group">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="input-text form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                                    {{ __('Register') }}
                                                </button>
                                                 <p class="text-center" style="padding-top: 10px;">Already have an account? <a href="{{route('login')}}" style="color: #F41b3b;"><b>Log in</b></a></p>
                                            </div>

                                        </div>
                                    </form>
								</div>
							</div>
							<div style="padding-top: 20px; text-align: center">
							    <p>Join the hundreds of businesses that have already seen success with Localbeings.com. List your
                                    business today and take advantage of our free local business listing site to reach more
                                    customers and grow your business.
                                    </p>
							</div>
                        </div>
                    </div>
                </div>
			</section>
        </div>
    </body>
</html>
