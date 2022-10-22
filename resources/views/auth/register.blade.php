<x-guest>
    @slot('title', 'Login')
    @slot('body')

        <!-- Start Contact Area -->
        <section class="contact-area bg-red  pb-5">
            <div class="container">
                <div class="row align-items-center">

                    <div class="main-banner-image mt-3 ">
                        <img src="{{ asset('img/logo2.png') }}" alt="image" width="200px">
                    </div>

                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h2>Register Now to win</h2>
                            @if ($errors->any())
                                <div class="text-danger">

                                    <div class="font-medium text-red-600">
                                        {{ __('Whoops! Something went wrong.') }}
                                    </div>

                                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif

                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <p>User Name:</p>
                                            <input type="text" name="user_name" id="name" required
                                                data-error="Please enter your name" placeholder="Your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <p>Full Name:</p>
                                            <input type="text" name="name" id="name" required
                                                data-error="Please enter your name" placeholder="Your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <p>Email Id:</p>
                                            <input type="email" name="email" id="email" required
                                                data-error="Please enter your email" placeholder="Your email address">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p>Phone No:</p>
                                            <input type="text" name="phone" id="phone_number" required
                                                data-error="Please enter your phone number" placeholder="Your phone number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p>Password:</p>
                                            <input type="confirm_password" name="password" id="password" required
                                             type="password"   data-error="Please enter valid password" placeholder="Enter  Password">

                                            <p>Confirm Password:</p>
                                            <input type="confirm_password" name="password_confirmation"
                                              type="password"  id="confirm_password" required data-error="Please enter valid password"
                                                placeholder="Enter Confirm Password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn">Register</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-9"> <a href="{{ route('login') }}">Already have account</a>
                                        </div>
                                        <div class="col-3">
                                            <a href="{{route('password.request')}}">Forget Password</a>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </section>
        <!-- End Contact Area -->

    @endslot
</x-guest>
