<x-layout>
    @slot('title', 'wallet')
    @slot('body')
    
        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30 bg-red">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mb-4 ">
                        <div class="single-stream-schedule-box white-bg shadow bg-white rounded ">
                            {{-- <span class="date">Oct <br> 23</span> --}}
                            <div class="content ">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <span class="time">Total Balance</span>
                                        <h3 class="text-black mt--10">₹ {{ $total_balance }}</h3>
                                    </div>
                                    <div class="col-4 col-md-2 mt-3">
                                        <a href="{{ route('add_cash') }}" class="btn btn-sm blue-bg text-white me-1">Add
                                            Cash </a>
                                        {{-- <i class="fas fa-info-circle text-red"></i> --}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="content mt-1">
                                <div class="row">
                                    <div class="col-8 col-md-10">
                                        <span class="time">Pedding Redeemable Balance</span>
                                        <h3 class="text-black mt--10">₹ {{ $total_redeem_balance }}</h3>
                                    </div>
                                    <div class="col-4 col-md-2">
                                        <a href="{{ route('withdraw') }}"
                                            class="btn btn-sm blue-bg text-white me-1">Withdraw</a>
                                        <!-- <button class="btn btn-sm blue-bg text-white me-1 ">Withdraw </button>
                                        <i class="fas fa-info-circle text-red"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 ">
                        <div class="single-stream-schedule-box pl-1 mt-3 rounded-pill shadow bg-white rounded">
                            <div class="p-1 pt-3 text-center ">
                                <div class="row">
                                    <div class="col-11">
                                        <a href="{{ route('wallet.transaction') }}">
                                            <h5 class="text-success">Pending/Failed All Transaction</h5>
                                        </a>
                                    </div>
                                    <div class="col-1">
                                        <i class="fas fa-chevron-right text-red"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
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
