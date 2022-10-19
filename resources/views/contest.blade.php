

<x-layout>
    @slot('title', 'contest')
    @slot('body')


        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-100 bg-red">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link  active" id="description-tab" data-bs-toggle="tab"
                                        href="#description" role="tab" aria-controls="description">All Contest</a></li>
                                <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        href="#reviews" role="tab" aria-controls="reviews">My Contest (1)</a></li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  show active" id="description" role="tabpanel">
                                    @foreach ($data as $con)
                                        <div class="products-reviews white-bg p-15 mb-3">
                                            <div class="blue-bor m-2 p-4">
                                                <span class="time">₹ {{ $con->total_price }} Winning Amount <a
                                                        class="text-red" data-toggle="modal" data-target="#myModal"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i> </a>
                                                    <i class='bx bx:info-circle'></i></span>
                                                <span class="float-end white-bg">{{ $con->no_of_winnners }}</span>
                                                <span class="small float-end mt-3 ml-4 mr--25px">winners</span>
                                                <div class="content pt-2 pb-4">
                                                    <div class="pb-3">
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div class="bar-2"></div>
                                                            </div>
                                                            <span class="text-black text-center small mt-3 ml-4 ">257/1000
                                                                joined</span>
                                                        </div>
                                                        <div class="side right">
                                                            <div><button class="blue-bg text-white plb float-right mrr-60">₹
                                                                    {{$con->participate_amount}}</button> <br><br></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="sm-text float-start "><a class="text-red" data-toggle="modal"
                                                    data-target="#myModal">₹{{$con->total_price}} | <i class="fas fa-trophy-alt"></i> {{$con->percentage_of_winners}}% winners </a> | <i class="fas fa-users"></i> {{ $con->no_of_winnners }} Winners </p>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="products-reviews white-bg p-15 mb-3">
                                        <h4 class="text-black">Practice Contest -₹0</h4>
                                        <p class="float-end mt-30">upto 15 teams </p>
                                        <div class="blue-bor p-4">
                                            <span class="time">₹ 0 <i class='bx bx:info-circle'></i></span>
                                            <span class="float-end white-bg">1000</span>
                                            <span class="small float-end mt-3 ml-4 mr--25px">winners</span>
                                            <div class="content pt-2 pb-4">
                                                <div class="">
                                                    <div class="middle">
                                                        <div class="bar-container">
                                                            <div class="bar-2"></div>
                                                        </div>
                                                        <span class="text-black text-center small mt-3 ml-4 ">257/1000
                                                            joined</span>
                                                    </div>
                                                    <div class="side right">
                                                        <div><button
                                                                class="blue-bg text-white plb float-right mrr-60 mt-30">₹
                                                                0</button> <br><br></div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Products Details Area -->





        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>


    @endslot
</x-layout>

{{-- price money modal starts --}}
