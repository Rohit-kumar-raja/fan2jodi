<x-layout>

    @slot('title', 'players')
    @slot('body')
        <section class="gallery-area pt-100 pb-70 mt-3">
            <div class="page-title-content text-center">
                <h1 title="Gallery">Player List</h1>
            </div>
            <div class="container">

                <div class="row text-center mx-0">


                    <div class="col-6 bg-dark col-lg-3 col-md-3 col-sm-3">
                        <div class="  ">

                            <div class="base">
                                <h4>You Won</h4>
                                <h3>$10</h3>
                            </div>
                            <canvas id="scratch" height="200"></canvas>

                        </div>
                    </div>
                    <div class="col-6 bg-dark col-lg-3 col-md-3 col-sm-3">
                        <div class="  ">
                            <div class="container">
                                <div class="base">
                                    <h4>You Won</h4>
                                    <h3>$10</h3>
                                </div>
                                <canvas id="scratch1" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </section>
        <!-- End Gallery Area -->

    @endslot

</x-layout>
<style>
    .base {
        position: absolute;
        width: 180px;
        margin-top: 61px;
    }
</style>


<script src="{{ asset('js/scratch.js') }}"></script>
