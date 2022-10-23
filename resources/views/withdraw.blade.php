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
                            <!-- <span class="text-red">YOU GET</span>
                                        <span class="text-success">₹ 100</span><br> -->
                            <button type="submit" class="btn btn-success">Withdraw Request</button>
                        </div>


                    </div>
            </div>
            </form>
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
