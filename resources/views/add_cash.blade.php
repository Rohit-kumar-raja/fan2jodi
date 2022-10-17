<x-layout>
@slot('title','add_cash')
@slot('body')

      

        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30">
            <div class="container">
                <div class="row">
                    
                    {{-- <div class="col-lg-12 col-md-12">
                        <div class="text-center br-10 white-bg">
                            <div class="content">
                                <h3 class="text-blue">ADD CASH</h3>
                            </div>                            
                        </div>
                    </div> --}}

                    <div class="col-lg-12 col-md-12 mb-4">
                        <div class="single-stream-schedule-box white-bg">
                            {{-- <span class="date">Oct <br> 23</span> --}}
                            <div class="content">
                                <span class="time">Enter Amount</span>
                                <input type="text" class="design" placeholder="₹50 to ₹20000">
                                {{-- <button class="btnnn float-end mt-30">i</button>                                 --}}
                                {{-- <h3>₹ 88.20</h3> --}}
                            </div> <br><br>
                            <button class="btn btn-md mr-20 text-white blue-bg mt-30">₹100 </button>
                            <button class="btn btn-md mr-20 text-white blue-bg mt-30">₹200 </button>
                            <button class="btn btn-md mr-20 text-white blue-bg mt-30">₹500 </button>
                            <button class="btn btn-md mr-20 text-white blue-bg mt-30">₹1000 </button>
                            
                        </div>   
                    </div>
                    <div class="text-center">
                        <span>YOU GET</span>
                        <span>₹ 100</span><br>
                        <button class="btn btn-lg mr-20 text-white blue-bg">Add Cash </button>
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