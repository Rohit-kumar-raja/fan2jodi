<style>
    .icon {
        padding-left: 2px;
        background: url("https://static.thenounproject.com/png/101791-200.png") no-repeat left;
        background-size: 20px;
    }
</style>


<x-layout>
    @slot('title', 'My account')
    @slot('body')



        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30">
            <div class="container">
                <div class="row">

                    {{-- <div class="col-lg-12 col-md-12">
                        <div class="text-center br-10 white-bg">
                            <div class="content">
                                <h3 class="text-blue">MY ACCOUNT</h3>
                            </div>                            
                        </div>
                    </div> --}}

                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="single-stream-schedule-box blue-bg">
                            <div class="flex-container">
                                <div class="flex-child">
                                    <img src={{ asset('img/user3.jpg') }} class="user-img img-br">
                                    <br><button class="bnt">Edit</button>
                                </div>

                                <div class="flex-child">
                                    <span>{{Auth::user()->user_name}}</span>
                                    <div class="ratingg ">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star-half'></i>
                                    </div>
                                    <!-- <span>Bronze</span> -->
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 mtt-30">
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
                        <form action="{{url('update-profile')}}" method="post">
                            @csrf()
                            <div class="single-stream-schedule-box blue-bg">
                                {{-- <span class="date">Oct <br> 23</span> --}}
                                <span class="time">KYC Pending</span>
                                <div class="content kyc">
                                    <input type="number" class="designn text-white" value="{{Auth::user()->phone}}" name="phone" placeholder="Mobile No">&ensp;
                                    <br><br>
                                    <input type="email" class="designn text-white" value="{{Auth::user()->email}}" name="email"  placeholder="Email Id">&ensp;
                                    <br><br>
                                    <input type="text" class="designn text-white" name="document" value="{{Auth::user()->document}}"   placeholder="PAN Card">&ensp;
                                    <input type="hidden" class="designn text-white" name="document_type" value="pan_card" placeholder="PAN Card">&ensp;
                                    <!-- <button type="button" class="float-right mt-30">Verify</button> <br><br> -->
                                </div> <br>
                                <div class="content kyc">
                                    <input type="text" class="designn text-white" name="state" value="{{Auth::user()->state}}"  placeholder="State">&ensp;
                                </div> <br>
                                <div class="content kyc">
                                    <input type="password" name="password"  class="designn text-white" placeholder="Password"><br>
                                </div> <br>
                                <div class="content kyc">
                                    <button type="submit" class="plb float-right mt-30">Update</button>
                                </div> <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Stream Schedule Area -->




        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>

    @endslot
</x-layout>
