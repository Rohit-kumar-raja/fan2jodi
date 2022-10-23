<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<x-layout>
    @slot('title', 'Contest Details')
    @slot('body')
        <!-- Start Products Details Area -->
        <section class="products-details-area ptb-100 bg-red">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item text-red"><a class="nav-link  active">My All Contest Player List
                                        Details</a></li>

                            </ul>
                            <!-- Button trigger modal -->
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  show active" id="description" role="tabpanel">

                                    {{-- my contest start --}}
                                    <div class="products-reviews  tab-pane fade  show active">
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

                                            {{-- pay alert model end --}}

                                            <div class="products-reviews white-bg p-15 mb-3">
                                                @php
                                                    $matches = DB::table('matches')->find($con->matches_id);
                                                @endphp
                                                <div class="text-center">
                                                    <a href="{{ route('contest.my.details', $con->id) }}"
                                                        class="text-red text-center">{{ $matches->name }} - <span
                                                            class="text-primary">{{ $matches->date }}</span></a>

                                                </div>

                                                <div class="blue-bor m-2 p-4">
                                                    <span class="time text-black">₹ {{ $con->total_price }} Winning
                                                        Amount <a class="text-red" data-toggle="modal"
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
                                                                    <a class=" btn btn-success btn-sm"
                                                                        href="{{ route('contest.my.details', $con->id) }}">Player
                                                                    </a>
                                                                    <button type="button"
                                                                        class="blue-bg text-white plb float-right mrr-60 btn btn-sm">
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
                                            </a>
                                        @endforeach

                                    </div>
                                    <div class="products-reviews white-bg mb-3 rounded-3">
                                        <h2 class="text-danger pl-3 pt-2 bg-dark">Rohit Kumar<i class='bx bx:info-circle'></i></h2>
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                                <img src={{asset('img/user3.jpg')}} class="rounded-3 mb-2">
                                                <div class="text-center"><button class="btn btn-sm btn-outline-primary">Player 1 <br>Run:20</button></div>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <img src={{asset('img/user3.jpg')}} class="rounded-3 mb-2">
                                                <div class="text-center"><button class="btn btn-sm btn-outline-primary">Player 2 <br>Run:20</button></div>
                                            </div>
                                            <div class="col-md-4 col-4 mt-3">
                                                <h2 class="text-primary">Aus-6<h2>
                                                <h2 class="text-primary">NZ-6<h2>
                                                
                                            </div>
                                            </div>    <hr>                                                                            
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
