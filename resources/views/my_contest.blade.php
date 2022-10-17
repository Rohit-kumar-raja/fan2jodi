<x-layout>
    @slot('title', 'contest')
    @slot('body')



        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="text-center br-10 white-bg">
                            <div class="content">
                                <h3 class="text-blue">MY CONTEST</h3>
                            </div>
                        </div>
                    </div>



                    <div id="tsum-tabs">
                        <main>

                            <input id="tab1" type="radio" name="tabs" checked>
                            <label for="tab1">Codepen</label>

                            <input id="tab2" type="radio" name="tabs">
                            <label for="tab2">Dribbble</label>

                            <input id="tab3" type="radio" name="tabs">
                            <label for="tab3">Dropbox</label>

                            <input id="tab4" type="radio" name="tabs">
                            <label for="tab4">Drupal</label>

                            <section id="content1">
                                <p>
                                    CONTENT FIR TAB 1
                                </p>
                            </section>

                            <section id="content2">
                                <p>
                                    CONTENT FIR TAB 2
                                </p>
                            </section>

                            <section id="content3">
                                <p>
                                    CONTENT FIR TAB 3
                                </p>
                            </section>

                            <section id="content4">
                                <p>
                                    CONTENT FIR TAB 4
                                </p>
                            </section>

                        </main>
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
