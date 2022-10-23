<style>
    .icon {
        padding-left: 2px;
        background: url("https://static.thenounproject.com/png/101791-200.png") no-repeat left;
        background-size: 20px;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


<x-layout>
    @slot('title', 'My account')
    @slot('body')



        <!-- Start Stream Schedule Area -->
        <section class="stream-schedule-area pt-100 pb-70 mtt-30 bg-red">
            <div class="container">
                <div class="row">

                    {{-- <div class="col-lg-12 col-md-12">
                        <div class="text-center br-10 white-bg">
                            <div class="content">
                                <h3 class="text-blue">MY ACCOUNT</h3>
                            </div>                            
                        </div>
                    </div> --}}

                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="single-stream-schedule-box blue-bg">
                            <div class="flex-container">
                                <div class="flex-child">
                                        @if(Auth::user()->images)
                                        <img src="{{ asset('upload/user') }}/{{Auth::user()->images}}"  width="130" style="border:solid" class="user-img img-br">
                                        @else
                                        <img src="{{ asset('img/user3.jpg') }}"   width="130" style="border:solid" class="user-img img-br">
                                        @endif
                                    <!-- <img src={{ asset('img/user3.jpg') }} class="user-img img-br"> -->
                                    <br><button type="button" class="bnt" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                </div>
                                <div class="flex-child">
                                    <span>{{Auth::user()->user_name}}</span>
                                    <div class="ratingg ">
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star'></i>
                                        <i class='bx bxs-star-half'></i>
                                    </div>
                                    <!-- <span>Bronze</span> -->
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-6 mtt-30">
                        @if ($errors->any())
                                <div class="text-danger">

                                    <div class="font-medium text-red-600">
                                        {{ __('Whoops! Something went wrong.') }}
                                    </div>

                                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            @endif
                        <form action="{{url('update-profile')}}" method="post">
                            @csrf()
                            <div class="single-stream-schedule-box blue-bg">
                                {{-- <span class="date">Oct <br> 23</span> --}}
                                <span class="time">KYC Pending</span>
                                <div class="content kyc">
                                    <input type="number" class="designn text-white" value="{{Auth::user()->phone}}" name="phone" required placeholder="Mobile No">&ensp;
                                    <br><br>
                                    <input type="email" class="designn text-white" value="{{Auth::user()->email}}" name="email"  required placeholder="Email Id">&ensp;
                                    <br><br>
                                    <input type="text" class="designn text-white" name="document" value="{{Auth::user()->document}}"   placeholder="PAN Card">&ensp;
                                    <input type="hidden" class="designn text-white" name="document_type" value="pan_card"  placeholder="PAN Card">&ensp;
                                    <!-- <button type="button" class="float-right mt-30">Verify</button> <br><br> -->
                                </div> <br>
                                <div class="content kyc">
                                    <input type="text" class="designn text-white" name="state" value="{{Auth::user()->state}}" required  placeholder="State">&ensp;
                                </div> <br>
                                <div class="content kyc">
                                    <input type="password" name="password"  class="designn text-white" placeholder="Password"><br>
                                </div> <br>
                                <div class="content kyc">
                                    <button type="submit" class="plb float-right mt-30">Update</button>
                                </div> <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Stream Schedule Area -->




        <div class="go-top"><i class='bx bx-up-arrow-alt'></i></div>

        <div class="zelda-cursor"></div>
        <div class="zelda-cursor2"></div>



        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form action="{{url('update-user-profile')}}" method="post" enctype="multipart/form-data">
                        @csrf()
                        <div class="modal-header">
                            <h5 class="modal-title text-black" id="exampleModalLabel">User Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="text-black">User Name</label>
                                    <input type="text" name="user_name" value="{{\Auth::user()->user_name}}"  id="user_name" class="form-control text-black">
                                </div>
                                <div class="col-lg-12">
                                    <div class="flex-child">
                                    <div id="image_preview_section">
                                        @if(Auth::user()->images)
                                        <img src="{{ asset('upload/user') }}/{{Auth::user()->images}}"  id="user_img" width="130" style="border:solid" class="user-img img-br">
                                        @else
                                        <img src="{{ asset('img/user3.jpg') }}"  id="user_img" width="130" style="border:solid" class="user-img img-br">
                                        @endif
                                    </div>
                                        </br>
                                        <input type="file" name="update_image" id="file" accept="image/*" onchange="validateimg(this)" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    @endslot
</x-layout>
<script>
    function validateimg(ctrl) {
            var fileUpload = ctrl;
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(.jpg|.PNG|.JPG|.jpeg|.png)$");
            if (regex.test(fileUpload.value.toLowerCase())) {
                if (typeof(fileUpload.files) != "undefined") {
                    var reader = new FileReader();
                    reader.readAsDataURL(fileUpload.files[0]);
                    reader.onload = function(e) {
                        var image = new Image();
                        image.src = e.target.result;
                        image.onload = function() {
                            var height = this.height;
                            var width = this.width;
                            // if (height < 500 || width < 500) {
                            //     alert("At least you can upload a 500*500 photo size.");
                            //     return false;
                            // } else {
                                // alert("Uploaded image has valid Height and Width.");
                                var validExtensions = ['jpg', 'png', 'jpeg', 'PNG',
                                    'JPG'
                                ]; //array of valid extensions
                                var fileName = fileUpload.files[0].name;
                                var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                                if ($.inArray(fileNameExt, validExtensions) == -1) {
                                    fileUpload.type = ''
                                    fileUpload.type = 'file'
                                    $('#user_img').attr('src', "");
                                    alert("Only these file types are accepted : " + validExtensions.join(', '));
                                } else {
                                    if (fileUpload.files || fileUpload.files[0]) {
                                        var filerdr = new FileReader();
                                        filerdr.onload = function(e) {
                                            $('#user_img').attr('src', e.target.result);
                                        }
                                        filerdr.readAsDataURL(fileUpload.files[0]);
                                    }
                                // }
                                // return true;
                            }
                        };
                    }
                } else {
                    alert("This browser does not support HTML5.");
                    return false;
                }
            } else {
                alert("Please select a valid Image file.");
                return false;
            }
        }
</script>