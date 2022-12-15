<style>
    .single-banner-item {
        padding-top: 60px !important;
        padding-bottom: 0px !important;
    }

    .battle-gradient{
        background: rgb(57,182,137)!important;
        background: linear-gradient(90deg, rgba(57,182,137,1) 0%, rgba(139,197,74,1) 100%)!important;
    }
</style>

<x-layout>
    @slot('title', 'battle')
    @slot('body')


        <!-- Start Main Banner Area -->
        <div class="home-slides owl-carousel owl-theme">
            @foreach ($sliders as $slider)
                <img src="  {{ env('IMG_URL') . 'slider/' . $slider->image_name }}" class="single-banner-item  "
                    data-jarallax='{"speed": 0.3}' />
            @endforeach
        </div>

        <!-- Start Products Details Area -->
        <section class="products-details-area battle-gradient ">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="text-black nav-link active" id="description-tab"
                                        data-bs-toggle="tab" href="#description" role="tab"
                                        aria-controls="description">Upcoming </a></li>
                                <li class="nav-item"><a class="text-black nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        href="#reviews" role="tab" aria-controls="reviews">Live</a></li>
                                        <li class="nav-item"><a class="text-black nav-link" id="reviews-tab" data-bs-toggle="tab"
                                            href="#reviews1" role="tab" aria-controls="reviews">Finished</a></li>
                            </ul>

                            <div class="tab-content " id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center battle-gradient">

                                            @foreach ($data as $battel)
                                                @if (strtotime($battel->date) > strtotime(date('Y-m-d')))
                                                    <div class="col-lg-12 col-md-12 " id="matches{{ $loop->iteration }}">
                                                        <a href="{{ route('contest', $battel->id) }}"
                                                            class="flex-container  border border-2 bg-gray10 rounded battle-gradient">
                                                            <div class="flex-child c1">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamoneimg }}"
                                                                    alt="image">
                                                            </div>

                                                            <div class="flex-child c2 p-2">
                                                                <div class="content blue-bg text-center p-2">
                                                                    <h3 class="text-white mb-0">{{ $battel->teamone }} vs
                                                                        {{ $battel->teamtwo }}</h3>
                                                                    <div id="timer"
                                                                        class="flex-wrap d-flex justify-content-center text-white">
                                                                        <div id="demo{{ $loop->iteration }}"
                                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                                            20D 20H 10
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child c3 ms-3">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamtwoimg }}"
                                                                    alt="image">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <?php
                                                    $y = explode(',', $battel->date)[1];
                                                    $m = explode(',', $battel->date)[2];
                                                    $date = $y . ',' . $m;
                                                    $timeF = explode(' ', $battel->time)[0];
                                                    $timeD = explode(' ', $battel->time)[1];
                                                    $time = date('H:i:s', strtotime($timeF . ' ' . $timeD));
                                                    ?>
                                                    <script>
                                                        // Set the date we're counting down to
                                                        var countDownDate{{ $loop->iteration }} = new Date("{{ $date }} {{ $time }}").getTime();

                                                        // Update the count down every 1 second
                                                        var x{{ $loop->iteration }} = setInterval(function() {
                                                            // Get today's date and time
                                                            var now{{ $loop->iteration }} = new Date().getTime();

                                                            // Find the distance between now and the count down date
                                                            var distance{{ $loop->iteration }} = countDownDate{{ $loop->iteration }} - now{{ $loop->iteration }};

                                                            // Time calculations for days, hours, minutes and seconds
                                                            var days{{ $loop->iteration }} = Math.floor(distance{{ $loop->iteration }} / (1000 * 60 * 60 * 24));
                                                            var hours{{ $loop->iteration }} = Math.floor((distance{{ $loop->iteration }} % (1000 * 60 * 60 *
                                                                24)) / (1000 * 60 * 60));
                                                            var minutes{{ $loop->iteration }} = Math.floor((distance{{ $loop->iteration }} % (1000 * 60 * 60)) / (
                                                                1000 * 60));
                                                            var seconds{{ $loop->iteration }} = Math.floor((distance{{ $loop->iteration }} % (1000 * 60)) / 1000);

                                                            // Display the result in the element with id="demo"
                                                            document.getElementById("demo{{ $loop->iteration }}").innerHTML = days{{ $loop->iteration }} + "d " +
                                                                hours{{ $loop->iteration }} + "h " +
                                                                minutes{{ $loop->iteration }} + "m " + seconds{{ $loop->iteration }} + "s ";

                                                            // If the count down is finished, write some text
                                                            if (distance{{ $loop->iteration }} < 0) {
                                                                clearInterval(x{{ $loop->iteration }});
                                                                document.getElementById("demo{{ $loop->iteration }}").innerHTML = "EXPIRED";
                                                                document.getElementById('matches{{ $loop->iteration }}').style.display = "none";
                                                            }

                                                        }, 1000);
                                                    </script>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center battle-gradient">
                                            @foreach ($data as $battel)
                                                @if (strtotime($battel->date ) == strtotime(date('Y-m-d')))
                                               

                                                    <div class="col-lg-12 col-md-12 ">
                                                        <a href="#"
                                                            class="flex-container  border border-2 bg-gray10 rounded battle-gradient">
                                                            <div class="flex-child c1">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamoneimg }}"
                                                                    alt="image">
                                                            </div>

                                                            <div class="flex-child c2 p-2">
                                                                <div class="content blue-bg text-center p-2">
                                                                    <h3 class="text-white mb-0">{{ $battel->teamone }} vs
                                                                        {{ $battel->teamtwo }}</h3>
                                                                    <div id="timer"
                                                                        class="flex-wrap d-flex justify-content-center text-white">
                                                                        <div id="demo{{ $loop->iteration }}"
                                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                                           {{ $battel->date}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child c3 ms-3">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamtwoimg }}"
                                                                    alt="image">
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="reviews1" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center battle-gradient">
                                            @foreach ($data as $battel)
                                                @if (strtotime($battel->date) < strtotime(date('Y-m-d')))
                                               

                                                    <div class="col-lg-12 col-md-12 ">
                                                        <a href="#"
                                                            class="flex-container  border border-2 bg-gray10 rounded battle-gradient">
                                                            <div class="flex-child c1">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamoneimg }}"
                                                                    alt="image">
                                                            </div>

                                                            <div class="flex-child c2 p-2">
                                                                <div class="content blue-bg text-center p-2">
                                                                    <h3 class="text-white mb-0">{{ $battel->teamone }} vs
                                                                        {{ $battel->teamtwo }}</h3>
                                                                    <div id="timer"
                                                                        class="flex-wrap d-flex justify-content-center text-white">
                                                                        <div id="demo{{ $loop->iteration }}"
                                                                            class="align-items-center flex-column d-flex justify-content-center">
                                                                           {{ $battel->date}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex-child c3 ms-3">
                                                                <img src="{{ env('IMG_URL') . 'matches/' . $battel->teamtwoimg }}"
                                                                    alt="image">
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endforeach
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
