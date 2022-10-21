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
                    @for ($i = 0; $i < $contest->no_of_participate; $i++)
                        <div class="col-6 col-lg-3 col-md-3 col-sm-3 wd-50">
                            <div class="single-gallery-item">

                                <div class="flip-box">
                                    <div class="flip-box-inner " id="screen{{ $i }}"
                                        onclick="fetchApi({{ $i }})">
                                        <div class="flip-box-front">
                                            <img src="{{ url('img/player3.png') }}" alt="Paris">
                                        </div>
                                        <div class="flip-box-back">
                                            <div class="single-gallery-item img-fluid">
                                                <span id="teamone{{ $i }}" class="text-success font-55"> </span>
                                                <br>
                                                <span id="teamtwo{{ $i }}" class="text-success font-55"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
        <!-- End Gallery Area -->

    @endslot

</x-layout>
<script>
    function fetchApi(data1) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            // getting the data from api
            obj = JSON.parse(this.responseText);
            console.log(obj);
            if (obj.team1 && obj.team2) {
                document.getElementById('teamone' + data1).innerText = obj.team1
                document.getElementById('teamtwo' + data1).innerText = obj.team2
            } else {
                document.getElementById('teamone' + data1).innerText = obj.error
                document.getElementById("teamone" + data1).classList.remove("text-success");
                document.getElementById("teamone" + data1).classList.add("text-red");
                document.getElementById("teamone" + data1).style.fontSize='40px';
            }
            document.getElementById("screen" + data1).style.transform = 'rotateY(540deg)'

        }
        var data = {
            matche_id: {{ $matche->id }},
            contest_id: {{ $contest->id }}
        };
        xhttp.open("POST", "{{ route('player.scratch.card') }}", true);
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.send(JSON.stringify(data));
    }
</script>
<style>
    .flip-box {
        background-color: transparent;
        width: 220px;
        height: 200px;
        border: 1px solid #f1f1f1;
        perspective: 1000px;
    }

    .flip-box-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.8s;
        transform-style: preserve-3d;
    }



    .flip-box-front,
    .flip-box-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-box-front {
        background-color: #bbb;
        color: black;
    }

    .flip-box-back {
        background-color: #555;
        color: white;
        transform: rotateY(180deg);
    }
</style>
