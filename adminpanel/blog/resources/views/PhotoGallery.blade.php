@extends('masterLayout.app')
@section('title', 'Photo Gallery')
@section('content')

    <div class="container-fluid table-color">
        <h4 class="text-success text-center">Photo Gallery</h4>
        <div class="row">
            <div class="col-md-12">
                <button data-toggle="modal" data-target="#PhotoModal" id="addNewPhotoBtnId" class="btn btn-sm btn-slack ml-2">Add New Photo</button>
            </div>
        </div>
        <div class="row photoRow ml-2">
        </div>
        <button class="btn btn-sm btn-slack button-middle" id="LoadMoreBtn">Load More</button>
    </div>



    <!--Add New Photo Modal-->
    <div class="modal fade" id="PhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-1">
                    <input class="form-control" id="imgInput" type="file">
                    <img class="imgPreview mt-3" id="imgPreview" src="{{asset('images/default-image.png')}}">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">Close</button>
                    <button id="SavePhoto" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!--Photo Delete Modal -->
    <div class="modal fade" id="PhotoDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center d-none">
                    <p class="d-none" id="PhotoDeleteId"></p>
                    <p class="d-none" id="PhotoDeleteImage"></p>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="PhotoDeleteConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        LoadPhoto();
    </script>
@endsection
