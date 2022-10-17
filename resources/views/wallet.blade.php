<x-layout>
    @slot('title','wallet')
    @slot('body')
    
          
    
            <!-- Start Stream Schedule Area -->
            <section class="stream-schedule-area pt-100 pb-70 mtt-30">
                <div class="container">
                    <div class="row">
                        
                        {{-- <div class="col-lg-12 col-md-12">
                            <div class="text-center br-10 white-bg">
                                <div class="content">
                                    <h3 class="text-blue">MY WALLET</h3>
                                </div>                            
                            </div>
                        </div> --}}
    
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="single-stream-schedule-box white-bg box-sh">
                                {{-- <span class="date">Oct <br> 23</span> --}}
                                <div class="content">
                                    <span class="time">Total Balance</span>
                                    <button class="btn btn-md mr-40 float-end text-white blue-bg mt-30">Add </button>
                                    <button class="btnnn float-end mt-30">i</button>                                
                                    <h3 class="text-black mt--10">₹ 88.20</h3>
                                </div> 
                                <div class="content">
                                    <span class="time">Redeemable Balance</span>
                                    <button class="btn btn-md mr-40 float-end blue-bor mt-30">Add </button>
                                    <button class="btnnn float-end mt-30">i</button>     
                                    <h3 class="text-black mt--10">₹ 70.20</h3>
                                </div>
                            </div>                        
                        </div>
                        {{-- <div class="col-lg-12 col-md-12 mb-4">
                            <div class="single-stream-schedule-box blue-bg">                                
                                <div class="content">
                                    <span class="time">Total Balance</span>
                                    <button class="btn btn-md mr-40 float-end white-bg mt-30">Add </button>
                                    <button class="btnnn float-end mt-30">i</button>                                
                                    <h3 class="mt--10">₹ 88.20</h3>
                                </div> 
                                <div class="content">
                                    <span class="time">Redeemable Balance</span>
                                    <button class="btn btn-md mr-40 float-end blue-br mt-30">Add </button>
                                    <button class="btnnn float-end mt-30">i</button>     
                                    <h3 class="mt--10">₹ 70.20</h3>
                                </div>
                            </div>                        
                        </div> --}}
                       
    
                    </div>
                </div>
            </section>
            <!-- End Stream Schedule Area -->
    
           
    
    
            <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>
    
            <div class="zelda-cursor"></div>
            <div class="zelda-cursor2"></div>
    
           @endslot
        </x-layout>