<x-guest>
    @slot('title', 'Login')
    @slot('body')

        <!-- Start Contact Area -->
        <section class="contact-area">
            <div class="container">
                <div class="row align-items-center">

                    <div class="main-banner-image mtb-100">
                        <img src="{{ url('img/logo2.png') }}" alt="image" width="200px">
                    </div>

                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <div class="contact-form">
                            <h2>Register Now to win</h2>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <p>User Name:</p>
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
                                            <input type="text" name="phone_number" id="phone_number" required
                                                data-error="Please enter your phone number" placeholder="Your phone number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p>Password:</p>
                                            <input type="password" name="password" id="password" required
                                                data-error="Please enter valid password" placeholder="Enter Password">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <p>Confirm Password:</p>
                                            <input type="confirm_password" name="confirm_password" id="confirm_password"
                                                required data-error="Please enter valid password"
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
                                            <a href="">Forget Password</a>
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
