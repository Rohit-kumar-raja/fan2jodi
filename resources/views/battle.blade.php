<x-layout>
    @slot('title', 'battle')
    @slot('body')


        <!-- Start Main Banner Area -->
        <div class="home-slides owl-carousel owl-theme">
            @foreach ($sliders as $slider)
                <div style="background-image: url('{{ env('IMG_URL') . 'slider/' . $slider->image_name }}');"
                    class="single-banner-item  jarallax" data-jarallax='{"speed": 0.3}'>
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-12">
                                <div class="main-banner-content">
                                    <div class="logo">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>


        <!-- Start Products Details Area -->
        <section class="products-details-area  bg-red ">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="text-black nav-link active" id="description-tab"
                                        data-bs-toggle="tab" href="#description" role="tab"
                                        aria-controls="description">Upcoming</a></li>
                                {{-- <li class="nav-item"><a class="text-black nav-link" id="reviews-tab" data-bs-toggle="tab"
                                        href="#reviews" role="tab" aria-controls="reviews">Finished</a></li> --}}
                            </ul>

                            <div class="tab-content " id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center">

                                            @foreach ($data as $battel)
                                                <div class="col-lg-12 col-md-12">
                                                    <a href="{{ route('contest',$battel->id) }}"
                                                        class="flex-container  border border-2 bg-gray10 rounded">
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
                                                                    <div id="demo{{$loop->iteration}}"
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
                                                $y=explode(',',$battel->date)[1];
                                                $m=explode(',',$battel->date)[2];
                                                $date =$y.','.$m;
                                                $time = explode(' ', $battel->time)[0];
                                                ?>
                                                <script>
                                                    // Set the date we're counting down to
                                                    var countDownDate{{$loop->iteration}} = new Date("{{ $date }} {{ $time }}").getTime();

                                                    // Update the count down every 1 second
                                                    var x{{$loop->iteration}} = setInterval(function() {
                                                        // Get today's date and time
                                                        var now{{$loop->iteration}} = new Date().getTime();

                                                        // Find the distance between now and the count down date
                                                        var distance{{$loop->iteration}} = countDownDate{{$loop->iteration}} - now{{$loop->iteration}};

                                                        // Time calculations for days, hours, minutes and seconds
                                                        var days{{$loop->iteration}} = Math.floor(distance{{$loop->iteration}} / (1000 * 60 * 60 * 24));
                                                        var hours{{$loop->iteration}} = Math.floor((distance{{$loop->iteration}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                        var minutes{{$loop->iteration}} = Math.floor((distance{{$loop->iteration}} % (1000 * 60 * 60)) / (1000 * 60));
                                                        var seconds{{$loop->iteration}} = Math.floor((distance{{$loop->iteration}} % (1000 * 60)) / 1000);

                                                        // Display the result in the element with id="demo"
                                                        document.getElementById("demo{{$loop->iteration}}").innerHTML = days{{$loop->iteration}} + "d " + hours{{$loop->iteration}} + "h " +
                                                            minutes{{$loop->iteration}} + "m " + seconds{{$loop->iteration}} + "s ";

                                                        // If the count down is finished, write some text
                                                        if (distance{{$loop->iteration}} < 0) {
                                                            clearInterval(x{{$loop->iteration}});
                                                            document.getElementById("demo{{$loop->iteration}}").innerHTML = "EXPIRED";
                                                        }
                                                    }, 1000);
                                                </script>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="single-matches-box">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="flex-container mt--10">
                                                    <div class="flex-child c1">
                                                        <img src="{{ asset('img/t1.png') }}" alt="image">
                                                    </div>
                                                    <div class="flex-child c2">
                                                        <div class="content blue-bg text-center">
                                                            <h3 class="text-white mb-0">SL vs SA T20</h3>
                                                            <h6 class="text-white">2 days</h6>
                                                        </div>
                                                    </div>
                                                    <div class="flex-child c3">
                                                        <img src="{{ asset('img/t2.png') }}" alt="image">
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
            </div>
        </section>
        <!-- End Products Details Area -->


        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>

    @endslot
</x-layout>
