@extends('masterLayout.app')
@section('title', 'Social Link')
@section('content')
    <!--For Social Media Link-->
    <div class="container-fluid table-color">
        <div class="row">
            <div class="col-12 mb-3">
                <h4 class="text-success text-center">Social Media Link</h4>
            </div>

            <div class="col-md-3"></div>
            <div class="col-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/facebook.png')}}" alt="Card image cap">
                    <p id="FacebookData" class=""></p>
                    <button id="FacebookLinkBtn" class="btn btn-sm btn-slack">Edit Link</button>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/twitter.png')}}" alt="Card image cap">
                    <p id="TwitterData" class=""></p>
                    <button id="TwitterLinkBtn" class="btn btn-sm btn-slack">Edit Link</button>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/instagram.png')}}" alt="Card image cap">
                    <p id="LinkedinData" class=""></p>
                    <button id="LinkedinLinkBtn" class="btn btn-sm btn-slack">Edit Link</button>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>


        <br>
        <br>

        <!--For Android And IOS Link-->
        <div class="row">
            <div class="col-12 mt-2 mb-3">
                <h4 class="text-success text-center">Android And IOS App Link</h4>
            </div>
            <div class="col-md-4"></div>
            <div class="col-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/appLogo2.png')}}" alt="Card image cap">
                    <p id="AndroidData" class=""></p>
                    <button id="AndroidLinkBtn" class="btn btn-sm btn-slack">Edit Link</button>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <img class="card-img-top" src="{{asset('images/appLogo1.png')}}" alt="Card image cap">
                    <p id="IosData" class=""></p>
                    <button id="IosLinkBtn" class="btn btn-sm btn-slack">Edit Link</button>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


    <!--Facebook Edit & Update Modal-->
    <div class="modal fade" id="FacebookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to update facebook link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <p id="FacebookModalCode"> </p>
                    <input id="FacebookLink" type="text" class="form-control mb-2">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="FacebookConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Twitter Edit & Update  Modal -->
    <div class="modal fade" id="TwitterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to update twitter link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <p id="TwitterModalCode"> </p>
                    <input id="TwitterLink" type="text" class="form-control mb-2">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="TwitterConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Instagram Edit & Update  Modal-->
    <div class="modal fade" id="LinkedinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Update Linkedin Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-2">
                    <p id="LinkedinModalCode"> </p>
                    <input id="LinkedinLink" type="text" class="form-control mb-2">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="LinkedinConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Android Link Edit & Update  Modal-->
    <div class="modal fade" id="AndroidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Update Android Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <p id="AndroidModalCode"> </p>
                    <input id="AndroidLink" type="text" class="form-control mb-2">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="AndroidConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--IOS Link Edit & Update  Modal-->
    <div class="modal fade" id="IosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Update Ios Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <p id="IosModalCode"> </p>
                    <input id="IosLink" type="text" class="form-control mb-2">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="IosConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $('#FacebookLinkBtn').click(function(){
            $('#FacebookModal').modal('show');
        });

        $('#TwitterLinkBtn').click(function(){
            $('#TwitterModal').modal('show');
        });

        $('#LinkedinLinkBtn').click(function(){
            $('#LinkedinModal').modal('show');
        });

        $('#AndroidLinkBtn').click(function(){
            $('#AndroidModal').modal('show');
        });

        $('#IosLinkBtn').click(function(){
            $('#IosModal').modal('show');
        });

        getSiteInfoData();

        $('#FacebookConfirmBtn').click(function(){

        });

        $('#TwitterConfirmBtn').click(function(){

        });

        $('#LinkedinConfirmBtn').click(function(){

        });

        $('#AndroidConfirmBtn').click(function(){

        });

        $('#IosConfirmBtn').click(function(){

        });

    </script>
@endsection

