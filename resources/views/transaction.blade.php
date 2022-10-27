<x-layout>
    @slot('title', 'transaction Summary')
    @slot('body')



        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 mt-70 bg-red">
            <div class="container white-bg rounded">
                <div class="row  ">

                    <div class="col-lg-12 col-md-12 mb-5 ">
                        <div class="single-stream-schedule-box pl-1 mt-3 rounded-pill">
                            <div class="p-1 pt-3 text-center">
                                <h5 class="text-success">Pending/Failed All Transaction</h5>
                                {{-- <button class="btn btn-md btn-success mr-10 mt--40 float-end text-white">Check Status
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="flex-container ">
                        <div class="flex-child mr-20 mt-3 mb-3">
                            <h2 class="text-black mb-0">Date Range</h2>
                            <div class="row">
                                <div class="col-5">
                                    <input type="date" name="date" class="form-control rounded-pill  text-black h-35">

                                </div>
                                <div class="col-5">
                                    <input type="date" name="date" class="form-control rounded-pill  text-black h-35">

                                </div>
                            </div>
                        </div>
                        <div class="flex-child mt-3 mb-3">
                            <h2 class="text-black mb-0">Transaction Type</h2>
                            <select class="form-control text-black h-35 rounded-pill">
                                <option>All</option>
                                <option>First</option>
                                <option>Second</option>
                                <option>Third</option>
                            </select>
                        </div>
                    </div> --}}
                    @foreach ($data as $tran)
                        <div class="col-lg-12 col-md-12 mb-4">
                            <div class="single-stream-schedule-box pink-bg shadow p-3 mb-5  rounded">
                                <div class="flex-container ">
                                    <div class="flex-child mrr-60 ml-20 ">
                                        @if ($tran->credit > 0)
                                            <i class="fa fa-plus-circle text-success" aria-hidden="true"></i>
                                            <span class=" mb-0 text-success">₹{{ $tran->credit }}</span>
                                        @else
                                            <i class="fa fa-minus-circle text-red " aria-hidden="true"></i>
                                            <span class="text-black mb-0 text-red">₹{{ $tran->debit }}</span>
                                        @endif
                                    </div>
                                    <div class="flex-child mr-20">
                                        <span class="text-black mb-0">



                                            @if (strlen($tran->api_info) < 50)
                                                Fantasy-Cricket-Entry - @if ($tran->withdraw_status == 1)
                                                    <span class="text-success">Success</span>
                                                @else
                                                    {{ $tran->withdraw_status }}
                                                @endif
                                            @else
                                                Cash Added <span class="text-success">Success</span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex-child">
                                        <span
                                            class="text-black mb-0 ml-20 text-gray">{{ date('d-m-Y', strtotime($tran->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class=" text-center">
                                    <span class="time">Rumble - INDIA</span>
                                    <span class="time">Time - {{ date('h.i A', strtotime($tran->created_at)) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $data->links() }}
            </div>
        </section>
        <!-- End Stream Schedule Area -->
        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>

    @endslot
</x-layout>
