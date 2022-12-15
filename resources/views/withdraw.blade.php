<x-layout>
    @slot('title', 'Withdraw')
    @slot('body')
        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30 bg-red">
            <div class="container ">
                <form action="{{ route('withdraw-request') }}" method="post">
                    @csrf()
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 ">
                            <div class="single-stream-schedule-box white-bg rounded  ">
                                <div class="content">
                                    @if (session('padding'))
                                        <div class="alert alert-success">
                                            {{ session('padding') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <span class="time">Enter Amount</span>
                                    <input type="number" min="50" max="20000" value="0" class="design"
                                        id="deposit_amount" name="deposit_amount" required onchange="handleAmount()"
                                        placeholder="₹50 to ₹20000">
                                </div> <br><br>
                                <button type="button" class="btn btn-md mr-20 text-white blue-bg mt-30"
                                    onclick="handleAppendCash(50)"> ₹50 </button>
                                <button type="button" class="btn btn-md mr-20 text-white blue-bg mt-30"
                                    onclick="handleAppendCash(100)">₹100 </button>
                                <button type="button" class="btn btn-md mr-20 text-white blue-bg mt-30"
                                    onclick="handleAppendCash(200)">₹200 </button>
                                <button type="button" class="btn btn-md mr-20 text-white blue-bg mt-30"
                                    onclick="handleAppendCash(500)">₹500 </button>
                            </div>
                        </div>
                        <div class="text-center single-stream-schedule-box white-bg rounded  p-3">
                            <div class="row text-center">
                                <div class="col-sm-4">
                                    <label for="type">Payment Type</label>
                                    <select class="form-control form-control-sm  text-red h-1" name="payment_type"
                                        id="type">
                                        <option selected disabled>- Payment Type -</option>
                                        <option value="paytm">paytm</option>
                                        <option value="upi">UPI</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="id">Payment id</label>
                                    <input id="id" type="text" class="form-control form-control-sm text-red "
                                        name="payment_id" placeholder="Enter Your Payment id">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-3 ">Withdraw Request</button>

                            <section class="stream-schedule-area ">

                                <div class="container white-bg rounded mt-4">
                                    <div class="row  ">



                                        @foreach ($data as $tran)
                                            <div class="col-lg-12 col-md-12 ">
                                                <div class="single-stream-schedule-box pink-bg shadow    rounded">
                                                    <div class="flex-container ">
                                                        <div class="flex-child  ">

                                                            <i class="fa fa-minus-circle text-danger"
                                                                aria-hidden="true"></i>
                                                            <span class=" mb-0 text-danger">₹{{ $tran->amount }}</span>
                                                            <span class=" mb-0 text-black">  {{ $tran->payment_status }}</span>

                                                        </div>

                                                        <div class="flex-child">
                                                            <span
                                                                class="text-black mb-0  text-gray">{{ date('d-m-Y', strtotime($tran->created_at)) }}</span>
                                                        </div>
                                                    </div>
                                                    <div class=" text-center">
                                                        <span class="time">Rumble - INDIA</span>
                                                        <span class="time">Time -
                                                            {{ date('h.i A', strtotime($tran->created_at)) }}</span>

                                                            <span class="text-info"> ({{ $tran->payment_type}} - {{$tran->payment_id}} )</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                    {{ $data->links() }}
                                </div>
                            </section>

                        </div>
                    </div>
                </form>
            </div>
        </section>


        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>

    @endslot
</x-layout>
<script>
    function handleAmount() {
        var deposit_amount = parseInt(document.getElementById('deposit_amount').value);


    }

    function handleAppendCash(amount) {
        var deposit_amount = parseInt(document.getElementById('deposit_amount').value);
        document.getElementById('deposit_amount').value = parseInt(amount);
    }
</script>
