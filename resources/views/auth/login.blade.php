<x-guest>
    @slot('title', 'login')
    @slot('body')

        <!-- Start Contact Area -->
        <section class="contact-area bg-red pb-5">
            <div class="container">
                <div class="row align-items-center">

                    <div class="main-banner-image mtb-100">
                        <img src="{{ url('img/logo2.png') }}" alt="image" width="200px">
                    </div>
                    <div class="col-sm-3"></div>

                    <div class="col-sm-6 text-center">
                        <div class="contact-form">
                            <h2>Login</h2>
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
                            <form action="{{ route('login')}}" method="POST" >
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <p>Email Address:</p>
                                            <input type="email" name="email" id="email" required
                                                data-error="Please enter your email" placeholder="Your email address">
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


                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn">Login</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-6"> <a href="{{ route('register') }}">I don't have account</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('password.request') }}">Forget Password</a>
                                        </div>

                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            </div>
        </section>
        <!-- End Contact Area -->

    @endslot
</x-guest>
