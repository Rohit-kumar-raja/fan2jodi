<x-layout>
    @slot('title', 'Match List')
    @slot('body')



        <!-- Start Matches Area -->
        <section class="matches-area bg-image ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">Matches</span>
                    <h2>Trending Matches</h2>
                </div>

                <div class="matches-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" id="all-matches-tab"
                                data-bs-toggle="tab" href="#all-matches" role="tab" aria-controls="all-matches"
                                aria-selected="true">Upcoming Matches</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link" id="upcoming-matches-tab"
                                data-bs-toggle="tab" href="#upcoming-matches" role="tab"
                                aria-controls="upcoming-matches" aria-selected="false">Live Matches</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link" id="finished-matches-tab"
                                data-bs-toggle="tab" href="#finished-matches" role="tab"
                                aria-controls="finished-matches" aria-selected="false">Finished Matches</a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all-matches" role="tabpanel">
                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                    <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img class="img-fluid" src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img class="img-fluid" src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade " id="upcoming-matches" role="tabpanel">


                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show" id="finished-matches" role="tabpanel">

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="single-matches-box">
                                <div class="row align-items-center">
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
                                        </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="matches-team">
                                            <div class="content">
                                                <h3><a href="single-team.html">SL vs AUS</a></h3>
                                                <ul class="watch-list">
                                                    {{-- <li><span class="date-time">20TH May 2021, 23:00</span></li> --}}
                                                    <div id="timer" class="flex-wrap d-flex justify-content-center">
                                                        <div id="days"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="hours"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="minutes"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                        <div id="seconds"
                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                        </div>
                                                    </div>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                      <div class="col-3">
                                        <div class="matches-team">
                                            <img src="{{ url('img/team1.png') }}" alt="image">
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
        <!-- Start Matches Area -->










    @endslot
</x-layout>
