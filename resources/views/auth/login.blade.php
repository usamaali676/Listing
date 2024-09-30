<!DOCTYPE html>
<html>
    <head>
        <title>Login | Local Beings Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex" />
        @include('layouts.partials.headFront')
    </head>
    <body class="gray">
        <div class="clearfix"></div>
        <div id="main-wrapper" >
            <section style="padding: 10% 0">
				<div class="container">
					<div class="row align-items-start justify-content-center">
						<div class="col-xl-5 col-lg-8 col-md-12">
                            @if(session('message'))

                                <h4 class="alert alert-info text-center">{{session('message')}}</h4>

                            @endif

							<div class="signup-screen-wrap">
								<div class="signup-screen-single">
									<div class="text-center mb-4">
										<h4 class="m-0 ft-medium">Login Your Account</h4>
									</div>

									<form class="submit-form" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="form-group">
                                            <label class="mb-1" for="username">Username:</label>
                                            <input id="email" type="email" class="input-text form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1" for="password">Password:</label>

                                            <input id="password" type="password" class="input-text form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror


                                        </div>

                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="flex-1">
                                                    <input id="dd" class="checkbox-custom" name="dd" type="checkbox" checked>
                                                    <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <button type="submit" class="btn btn-md full-width theme-bg text-light rounded ft-medium">
                                                {{ __('Login') }}
                                            </button>
                                            <div class="register" style="padding-top: 20px">
                                                <a href="{{route('register')}}" style="color: #F41b3b "><b>Create A New Account</b></a>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>

						</div>
					</div>
				</div>
			</section>
        </div>
    </body>
</html>
