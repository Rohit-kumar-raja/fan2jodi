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
                                <div class="tab-pane fade  show active rounded-3" id="description" role="tabpanel">

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

                                            {{-- all kind of data getting --}}
                                            @php
                                                $participated_con_user = DB::table('participated_users')
                                                    ->where('user_id', Auth::user()->id)
                                                    ->where('contest_id', $con->id)
                                                    ->first();
                                                
                                                $team1 = explode(':', $participated_con_user->player)[0];
                                                $team2 = explode(':', $participated_con_user->player)[1];
                                                $team1_name = explode('-', $team1)[0];
                                                $team2_name = explode('-', $team2)[0];
                                                $team1_possition = explode('-', $team1)[1];
                                                $team2_possition = explode('-', $team2)[1];
                                                
                                                if ($matches->api != '') {
                                                    $matches_details = json_decode($matches->api);
                                                    $matches_team1_name = explode('-', $matches_team1 = $matches_details->details->one->score)[0];
                                                    $matches_team2_name = explode('-', $matches_team1 = $matches_details->details->two->score)[0];
                                                    if ($team1_name == $matches_team1_name) {
                                                        if ($team1_possition > 0) {
                                                            $team_one_batsman = ((array) $matches_details->details->one->sc->batting)[$team1_possition];
                                                        }
                                                    } else {
                                                        if ($team1_possition > 0) {
                                                            $team_one_batsman = ((array) $matches_details->details->two->sc->batting)[$team1_possition];
                                                        }
                                                    }
                                                    if ($team2_name == $matches_team2_name) {
                                                        if ($team2_possition) {
                                                            $team_two_batsman = ((array) $matches_details->details->two->sc->batting)[$team2_possition];
                                                        }
                                                    } else {
                                                        if ($team2_possition) {
                                                            $team_two_batsman = ((array) $matches_details->details->one->sc->batting)[$team2_possition];
                                                        }
                                                    }
                                                    $total_runs = ((int) explode(')', explode('(', $team_one_batsman->runs)[1])[0]) + ((int) explode(')', explode('(', $team_two_batsman->runs)[1])[0]);
                                                }
                                                
                                            @endphp

                                            </a>
                                            <div class="products-reviews white-bg mb-3 rounded-2">
                                                <h4 class="text-danger pl-3 pt-2 bg-dark "> {{ Auth::user()->user_name }} |
                                                    {{ Auth::user()->name }} | <span class="text-success">Total Run
                                                        -{{ $total_runs }}</span> </h4>
                                                <div class="row rounded">
                                                    <div class="col-md-4 col-4 text-center">
                                                        <img src={{ asset('img/user3.jpg') }} width="100px"
                                                            class="rounded-3 mb-2 ">
                                                        <div class="text-center">
                                                            <button
                                                                class="btn btn-sm btn-outline-primary">{{ $team_one_batsman->name ?? 'Player 1' }}
                                                            </button>
                                                            <button class="btn btn-sm btn-outline-success">Run :
                                                                {{ $team_one_batsman->runs ?? '0' }}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-4 text-center border-left border-right">
                                                        <img src={{ asset('img/user3.jpg') }} width="100px"
                                                            class="rounded-3 mb-2">
                                                        <div class="text-center"> <button
                                                                class="btn btn-sm btn-outline-primary">{{ $team_two_batsman->name ?? 'Player 2' }}
                                                            </button>
                                                            <button class="btn btn-sm btn-outline-success">Run :
                                                                {{ $team_two_batsman->runs ?? '0' }}</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-4 mt-3 text-center ">

                                                        <h2 class="text-red">
                                                            {{ $team1 }}
                                                            <h2>
                                                                <h2 class="text-red">
                                                                    {{ $team2 }}
                                                                    <h2>

                                                    </div>
                                                    <hr class="mt-2">
                                                    <div class="text-center">
                                                        <h3 class="text-red border-bottom border-2 border-success">All Users
                                                            Rank List</h3>
                                                    </div>
                                                    <hr class="mt-1 pe-3 ps-3">
                                                    <div class="modal-body">
                                                        <div class="order-table table-responsive white-bg">

                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Winning Position</th>
                                                                        <th>User Name</th>
                                                                        <th>Total Run</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @php
                                                                        // dd( $matches_details);
                                                                        $participated_user = DB::table('participated_users')
                                                                            ->where('contest_id', $con->id)
                                                                            ->orderByDesc('total_run')
                                                                            ->get();
                                                                        
                                                                    @endphp
                                                                    @foreach ($participated_user as $puser)
                                                                        @php
                                                                            $team1 = explode(':', $puser->player)[0];
                                                                            $team2 = explode(':', $puser->player)[1];
                                                                            $team1_name = explode('-', $team1)[0];
                                                                            $team2_name = explode('-', $team2)[0];
                                                                            $team1_possition = explode('-', $team1)[1];
                                                                            $team2_possition = explode('-', $team2)[1];
                                                                            
                                                                            if ($matches->api != '') {
                                                                                $matches_details = json_decode($matches->api);
                                                                                $matches_team1_name = explode('-', $matches_team1 = $matches_details->details->one->score)[0];
                                                                                $matches_team2_name = explode('-', $matches_team1 = $matches_details->details->two->score)[0];
                                                                                if ($team1_name == $matches_team1_name) {
                                                                                    if ($team1_possition > 0) {
                                                                                        $team_one_batsman = ((array) $matches_details->details->one->sc->batting)[$team1_possition];
                                                                                    }
                                                                                } else {
                                                                                    if ($team1_possition > 0) {
                                                                                        $team_one_batsman = ((array) $matches_details->details->two->sc->batting)[$team1_possition];
                                                                                    }
                                                                                }
                                                                                if ($team2_name == $matches_team2_name) {
                                                                                    if ($team2_possition > 0) {
                                                                                        $team_two_batsman = ((array) $matches_details->details->two->sc->batting)[$team2_possition];
                                                                                    }
                                                                                } else {
                                                                                    if ($team2_possition > 0) {
                                                                                        $team_two_batsman = ((array) $matches_details->details->one->sc->batting)[$team2_possition];
                                                                                    }
                                                                                }
                                                                                $total_runs = ((int) explode(')', explode('(', $team_one_batsman->runs)[1])[0]) + ((int) explode(')', explode('(', $team_two_batsman->runs)[1])[0]);
                                                                            }
                                                                            DB::table('participated_users')
                                                                                ->where('id', $puser->id)
                                                                                ->update(['total_run' => $total_runs]);
                                                                        @endphp

                                                                        <tr>
                                                                            <td class="product-name">
                                                                                <p>Rank {{ $loop->iteration }}</p>
                                                                            </td>
                                                                            <td class="product-name">
                                                                                <p> {{ DB::table('all_users')->find($puser->user_id)->user_name }}
                                                                                </p>
                                                                            </td>

                                                                            <td id="total_run" class="product-total"><span
                                                                                    class="subtotal-amount">

                                                                                    {{ $total_runs ?? '0' }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>

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
        <script></script>
        <!-- End Products Details Area -->
        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>
        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>
    @endslot
</x-layout>
