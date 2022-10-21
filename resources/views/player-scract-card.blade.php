<x-layout>
    <link rel="stylesheet" href="{{ asset('css/scratch.css') }}">
    @slot('title', 'players')
    @slot('body')

        <section class="gallery-area pt-100 pb-70 mt-3 bg-red">
            <div class="page-title-content text-center">
                <h1 title="Gallery">Player List</h1>
            </div>
            <div class="container">
                <div class="row text-center mx-0">

                    @foreach ($contest->no_of_participate as $scratch)
                        <div class="col-6 col-lg-3 col-md-3 col-sm-3 wd-50">
                            <div class="single-gallery-item">
                                <img class="img-fluid" src="{{ url('img/player3.png') }}" alt="image">
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-3 col-sm-3 wd-50 bg-white mb-4 ml-1 mr-1 pb-4 ">
                            <div class="single-gallery-item img-fluid">
                                <span class="text-red font-55"> IND-1</span> <br>
                                <span class="text-red font-55"> AUS-1</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Gallery Area -->

    @endslot

</x-layout>
