<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
                                        href="#reviews" role="tab" aria-controls="reviews">My Contest
                                        ({{ $my_contest_count }})</a></li>
                            </ul>
                            <!-- Button trigger modal -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  show active" id="description" role="tabpanel">
                                    @foreach ($data as $con)
                                        {{-- Rank model start --}}
                                        @php
                                            // getting the data of joined pepole
                                            $joined = DB::table('participated_users')
                                                ->where('contest_id', $con->id)
                                                ->where('matche_id', $con->matches_id)

                                                ->count('contest_id');
                                            $percentage = ($joined / $con->no_of_participate) * 100;
                                            
                                        @endphp
                                        <!-- The Modal -->
                                        <div class="modal" id="myModal{{ $con->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h2 class="modal-title text-red">Win Rs.{{ $con->total_price }}</h2>

                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="order-table table-responsive white-bg">
                                                            <span class="text-black f-18 ab"><strong>Pay
                                                                    Rs. {{ $con->participate_amount }}
                                                                </strong></span><br>
                                                            <span class="text-black f-18"><b>{{ $joined }}/{{ $con->no_of_participate }}
                                                                    Joined</b></span><br>
                                                            <div class="middle">
                                                                <div class="bar-container">
                                                                    <div style="width: {{ $percentage }}%" class="bar-4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="time"><img src="{{ asset('img/crown.png') }}"
                                                                    class="imgg" width="38px">
                                                                &ensp;{{ $con->no_of_winnners }} Winners <i
                                                                    class='bx bx:info-circle'></i></span>

                                                            <hr>
                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Winning Position</th>
                                                                        <th scope="col">Price Money</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @php
                                                                        $ranks = DB::table('contest_winner_ranks')
                                                                            ->where('contest_id', $con->id)
                                                                            ->get();
                                                                    @endphp
                                                                    @foreach ($ranks as $rank)
                                                                        <tr>
                                                                            <td class="product-name">
                                                                                @if ($rank->from == $rank->to)
                                                                                    <p>Rank {{ $rank->from }}</p>
                                                                                @else
                                                                                    <p>Rank {{ $rank->from }} -
                                                                                        {{ $rank->to }}</p>
                                                                                @endif
                                                                            </td>
                                                                            <td class="product-total"><span
                                                                                    class="subtotal-amount">{{ $rank->prize_amount }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        {{-- Rank  model end --}}

                                        {{-- pay alert model  start --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $con->id }}"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="staticBackdropLabel">Are You
                                                            sure To </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="text-danger">Are You sure To Join</h3>
                                                    </div>


                                                    <a href="{{ route('player.scratch', ['contest_id' => $con->id, 'matche_id' => $matche_id]) }}"
                                                        class="btn btn-primary text-center">Yes</a>

                                                </div>
                                            </div>
                                        </div>


                                        {{-- pay alert model end --}}
                                        <div class="products-reviews white-bg p-15 mb-3">
                                            <div class="blue-bor m-2 p-4">
                                                <span class="time">₹ {{ $con->total_price }} Winning Amount <a
                                                        class="text-red" data-toggle="modal"
                                                        data-target="#myModal{{ $con->id }}"><i
                                                            class="fa fa-info-circle" aria-hidden="true"></i> </a>
                                                    <i class='bx bx:info-circle'></i></span>
                                                <span class="float-end white-bg">{{ $con->no_of_winnners }} </span>
                                                <span class="small float-end mt-3 ml-4 mr--25px">winners</span>
                                                <div class="content pt-2 pb-4">
                                                    <div class="pb-3">
                                                        <div class="middle">
                                                            <div class="bar-container">
                                                                <div style="width: {{ $percentage }}%" class="bar-2">
                                                                </div>
                                                            </div>
                                                            <span class="text-black text-center small mt-3 ml-4 ">{{ $joined }}/{{ $con->no_of_participate }}
                                                                joined</span>
                                                        </div>
                                                        <div class="side right">
                                                            <div>
                                                                <button type="button"
                                                                    class="blue-bg text-white plb float-right mrr-60"
                                                                    data-toggle="modal"
                                                                    data-target="#staticBackdrop{{ $con->id }}">
                                                                    ₹ {{ $con->participate_amount }}
                                                                </button>
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="sm-text float-start "><a class="text-red" data-toggle="modal"
                                                    data-target="#myModal{{ $con->id }}">₹{{ $con->total_price }} |
                                                    <i class="fas fa-trophy-alt"></i> {{ $con->percentage_of_winners }}%
                                                    winners </a> | <i class="fas fa-users"></i> {{ $con->no_of_winnners }}
                                                Winners </p>
                                        </div>
                                    @endforeach

                                </div>
                                {{-- my contest start --}}
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="products-reviews  tab-pane fade  show">
                                        @foreach ($my_contest as $my)
                                            {{-- Rank model start --}}
                                            @php
                                                
                                                $con = DB::table('contests')->find($my->contest_id);
                                                
                                                // getting the data of joined pepole
                                                $joined = DB::table('participated_users')
                                                    ->where('contest_id', $con->id)
                                                    ->count('contest_id');
                                                $percentage = ($joined / $con->no_of_participate) * 100;
                                                
                                            @endphp
                                            <!-- The Modal -->
                                            <div class="modal" id="Modal{{ $con->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h2 class="modal-title text-red">Win
                                                                Rs.{{ $con->total_price }}</h2>

                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="order-table table-responsive white-bg">
                                                                <span class="text-black f-18 ab"><strong>Pay
                                                                        Rs. {{ $con->participate_amount }}
                                                                    </strong></span><br>
                                                                <span class="text-black f-18"><b>{{ $joined }}/{{ $con->no_of_participate }}
                                                                        Joined</b></span><br>
                                                                <div class="middle">
                                                                    <div class="bar-container">
                                                                        <div style="width: {{ $percentage }}%"
                                                                            class="bar-4">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <span class="time"><img
                                                                        src="{{ asset('img/crown.png') }}" class="imgg"
                                                                        width="38px">
                                                                    &ensp;{{ $con->no_of_winnners }} Winners <i
                                                                        class='bx bx:info-circle'></i></span>

                                                                <hr>
                                                                <table class="table table-bordered text-center">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Winning Position</th>
                                                                            <th scope="col">Price Money</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        @php
                                                                            $ranks = DB::table('contest_winner_ranks')
                                                                                ->where('contest_id', $con->id)
                                                                                ->get();
                                                                        @endphp
                                                                        @foreach ($ranks as $rank)
                                                                            <tr>
                                                                                <td class="product-name">
                                                                                    @if ($rank->from == $rank->to)
                                                                                        <p>Rank {{ $rank->from }}</p>
                                                                                    @else
                                                                                        <p>Rank {{ $rank->from }} -
                                                                                            {{ $rank->to }}</p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="product-total"><span
                                                                                        class="subtotal-amount">{{ $rank->prize_amount }}</span>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Rank  model end --}}

                                            {{-- pay alert model end --}}
                                            <div class="products-reviews white-bg p-15 mb-3">
                                                <div class="blue-bor m-2 p-4">
                                                    <span class="time">₹ {{ $con->total_price }} Winning Amount <a
                                                            class="text-red" data-toggle="modal"
                                                            data-target="#Modal{{ $con->id }}"><i
                                                                class="fa fa-info-circle" aria-hidden="true"></i> </a>
                                                        <i class='bx bx:info-circle'></i></span>
                                                    <span class="float-end white-bg">{{ $con->no_of_winnners }} </span>
                                                    <span class="small float-end mt-3 ml-4 mr--25px">winners</span>
                                                    <div class="content pt-2 pb-4">
                                                        <div class="pb-3">
                                                            <div class="middle">
                                                                <div class="bar-container">
                                                                    <div style="width: {{ $percentage }}%"
                                                                        class="bar-2">
                                                                    </div>
                                                                </div>
                                                                <span
                                                                    class="text-black text-center small mt-3 ml-4 ">{{ $joined }}/{{ $con->no_of_participate }}
                                                                    joined</span>
                                                            </div>
                                                            <div class="side right">
                                                                <div>
                                                                    <button type="button"
                                                                        class="blue-bg text-white plb float-right mrr-60">
                                                                        ₹
                                                                        {{ $con->participate_amount }}
                                                                    </button>
                                                                    <br><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="sm-text float-start "><a class="text-red" data-toggle="modal"
                                                        data-target="#Modal{{ $con->id }}">₹{{ $con->total_price }}
                                                        |
                                                        <i class="fas fa-trophy-alt"></i>
                                                        {{ $con->percentage_of_winners }}%
                                                        winners </a> | <i class="fas fa-users"></i>
                                                    {{ $con->no_of_winnners }}
                                                    Winners </p>
                                            </div>
                                        @endforeach
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
