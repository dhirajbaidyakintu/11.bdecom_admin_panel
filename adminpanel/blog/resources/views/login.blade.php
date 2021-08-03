@extends('masterLayout.appLogin')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center d-flex mt-5 mb-5">
            <div class="col-md-10 mt-5 card">
                <div class="row">
                    <div style="..." class="col-md-6 p-3">
                        <form action=" " class="loginForm m-5">
                            <div class="form-group">
                                <label for="exampleInputEmail"><strong>User Name</strong></label>
                                <input name="userName" value="" type="text" required="" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="User Name">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword"><strong>User Password</strong></label>
                                <input name="userPassword" value="" required="" type="text" class="form-control" id="exampleInputPassword" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-block btn-blue-grey">SIGN IN</button>
                            </div>
                        </form>
                    </div>

                    <div style="height: 450px" class="col-md-6 bg-light">
                        <img class="w-75 m-5" src="images/bannerImg.png">
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">
        LoginFunction();
        function LoginFunction(){
            $('.loginForm').on('submit', function (event){
                event.preventDefault();
                let formData= $(this).serializeArray();
                let userName= formData[0]['value'];
                let password= formData[1]['value'];
                let url="/onLogin";

                axios.post(url, {
                    user:userName,
                    pass:password
                }).then(function(response){
                    if (response.status == 200 && response.data == 1){
                        window.location.href= "/";
                    }else {
                        toastr.error('Login Failed! Try Again.');
                    }
                }).catch(function (error){
                    toastr.error('Login Failed! Try Again.');
                })
            })
        }

    </script>
@endsection
