@extends('masterLayout.app')
@section('title', 'Delivery Notice')
@section('content')

    <div class="container-fluid table-color">
        <h3 class="text-success text-center">Delivery Notice</h3>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <textarea id="DeliveryNoticeTextArea" class="SiteInfoTextArea"></textarea><br>
                <button id="DeliveryNoticeUpdateBtn" class="btn btn-slack">Edit & Update</button>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


    <!--Delivery Notice Edit And Update Modal-->
    <div class="modal fade" id="DeliveryNoticeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center d-none">
                    <p id="DeliveryNoticeModalCode"> </p>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="DeliveryNoticeConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        $('#DeliveryNoticeUpdateBtn').click(function(){
            $('#DeliveryNoticeModal').modal('show');
        });
        getSiteInfoData();
    </script>
@endsection

