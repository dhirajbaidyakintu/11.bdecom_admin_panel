@extends('masterLayout.app')
@section('title', 'Product Cart')
@section('content')
    <div id="mainDiv" class="container-fluid d-none table-color">
        <div class="col-md-12">
            <h4 class="text-center text-success">PRODUCT CART</h4>
        </div>
        <div class="row">
            <div class="col-md-12 p-5 overflow-auto">
                <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm"><strong>Image</strong></th>
                        <th class="th-sm"><strong>Product Name</strong></th>
                        <th class="th-sm"><strong>Product Code</strong></th>
                        <th class="th-sm"><strong>Shop Name and Code</strong></th>
                        <th class="th-sm"><strong>Product Info</strong></th>
                        <th class="th-sm"><strong>Product Quantity</strong></th>
                        <th class="th-sm"><strong>Unit Price</strong></th>
                        <th class="th-sm"><strong>Total Price</strong></th>
                        <th class="th-sm"><strong>Mobile</strong></th>
                        <th class="th-sm"><strong>Delete</strong></th>
                    </tr>
                    </thead>
                    <tbody id="service_table">
                    <!--Go To Your JavaScript getContactData() function, here i get data using axios and make a Row & Column For This Table-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!--For Loading Animation-->
    <div id="loaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loading-animaiton m-5" src="{{asset('images/loader.svg')}}">
            </div>
        </div>
    </div>




    <!--For Error or Wrong, if can not fetch data from database-->
    <div id="errorDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img src="{{asset('images/error.png')}}">
            </div>
        </div>
    </div>




    <!--For Service Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-3 text-center modal-1">
                    <h5 class="mt-4 text-white">Do You Want To Delete?</h5>
                    <h5 id="serviceDeleteId" class="mt-4 d-none">   </h5>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button id="serviceDeleteConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">
        getServicesData();

        //For service table to get data using axios
        function getServicesData() {
            axios.get('/getProductCartData').then(function(response) {
                //For loading and error
                if (response.status = 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');
                    $('#serviceDataTable').DataTable().destroy();//When We Delete Any Data From DataTable, Datatable Must Clear Else Don't Update
                    $('#service_table').empty();//When Data Update At This Time Table Must Empty Then Data Load

                    //For service table to get data using axios
                    var jsonData = response.data;
                    $.each(jsonData, function(i, item) {
                        $('<tr>').html(
                            "<td><img class='table-img' src=" + jsonData[i].img+"></td>" +
                            "<td>" + jsonData[i].product_name+ "</td>" +
                            "<td>" + jsonData[i].product_code+ "</td>" +
                            "<td>" + "Shop Name:" + jsonData[i].shop_name+ "</br>" + "Shop Code:" + jsonData[i].shop_code+ "</td>" +
                            "<td>" + jsonData[i].product_info+ "</td>" +
                            "<td>" + jsonData[i].product_quantity+ "</td>" +
                            "<td>" + jsonData[i].unit_price+ "</td>" +
                            "<td>" + jsonData[i].total_price+ "</td>" +
                            "<td>" + jsonData[i].mobile+ "</td>" +
                            "<td><a class='serviceDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#service_table')
                    });

                    //For Services Table Delete Icon Click
                    $('.serviceDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#serviceDeleteId').html(id);
                        //$('#serviceDeleteConfirmBtn').attr('data-id',id);
                        $('#deleteModal').modal('show');
                    })

                    //For DataTable (Pagination & How Many Data Show In One Page)
                    $('#serviceDataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');

                } else {
                    $('#loaderDiv').addClass('d-none');
                    $('#errorDiv').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#loaderDiv').addClass('d-none');
                $('#errorDiv').removeClass('d-none');
            });
        }




        //For Services Table Delete Modal Yes Button
        $('#serviceDeleteConfirmBtn').click(function() {
            var id = $('#serviceDeleteId').html();
            getServiceDelete(id);
        })
        //For Delete Data
        function getServiceDelete(deleteID) {
            $('#serviceDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//Loading Animation
            axios.post('/productCartDelete', {id: deleteID}).then(function(response) {
                $('#serviceDeleteConfirmBtn').html("Yes");//Loading Animation
                if(response.status == 200){
                    if (response.data == 1) {
                        //alert('Data Delete Successfully');
                        $('#deleteModal').modal('hide');
                        toastr.success('Data Delete Successfully');
                        getServicesData();
                    } else {
                        //alert('Data Delete Failed');
                        $('#deleteModal').modal('hide');
                        toastr.error('Data Delete Failed');
                        getServicesData();
                    }
                }else{
                    $('#deleteModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                }
            }).catch(function(error) {
                $('#deleteModal').modal('hide');
                toastr.error('Something Went Wrong!');
            });
        }
    </script>
@endsection















