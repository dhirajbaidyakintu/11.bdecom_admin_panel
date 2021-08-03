@extends('masterLayout.app')
@section('title', 'About Us')
@section('content')

    <div class="container-fluid table-color">
        <h3 class="text-center text-success mb-3">About Us</h3>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <textarea id="AboutUsTextArea" class="SiteInfoTextArea"></textarea><br>
                <button id="AboutUsUpdateBtn" class="btn btn-slack button-center">Edit & Update</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!--About Us Edit And Update Modal -->
    <div class="modal fade" id="AboutUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1 d-none">
                    <p id="AboutUsModalCode"></p>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="AboutUsConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $('#AboutUsUpdateBtn').click(function(){
            $('#AboutUsModal').modal('show');
        });
        getSiteInfoData();
    </script>
@endsection

