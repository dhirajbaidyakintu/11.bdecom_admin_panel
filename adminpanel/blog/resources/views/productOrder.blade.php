@extends('masterLayout.app')
@section('title', 'Product Order')
@section('content')
    <div id="mainDiv" class="container-fluid d-none table-color">
        <div class="col-md-12">
            <h4 class="text-center text-success">PRODUCT ORDER LIST</h4>
        </div>
        <div class="row">
            <div class="col-md-12 p-5 overflow-auto">
                <table id="serviceDataTable" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm"><strong>Invoice No</strong></th>
                        <th class="th-sm"><strong>Product Name & Code</strong></th>
                        <th class="th-sm"><strong>Shop Information</strong></th>
                        <th class="th-sm"><strong>Product Info</strong></th>
                        <th class="th-sm"><strong>Quantity & Unit & Total Price</strong></th>
                        <th class="th-sm"><strong>Order Details</strong></th>
                        <th class="th-sm"><strong>Order Status</strong></th>
                        <th class="th-sm"><strong>Edit</strong></th>
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
                    <button id="serviceDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>




    <!--For Service Edit modal-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white">Update Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4 text-center modal-1">
                    <h5 id="serviceEditId" class="mt-4 d-none">   </h5>
                    <div id="serviceEditForm" class="d-none w-100">
                        <br>
                        <!--
                        <input type="text" id="" class="form-control mb-4" placeholder="Order Status (Pending or Delivery or Location)"/>
                        -->

                        <select id="OrderStatusID" class="form-select w-100">
                            <option value="Pending">Pending</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Accepted By Courier">Accepted By Courier</option>
                            <option value="Delivered">Delivered</option>
                        </select>
                    </div>
                    <img id="serviceEditLoader" class="loading-animaiton m-5" src="{{asset('images/loader.svg')}}"> <!--For loading-->
                    <img id="serviceEditError" class="d-none error-img" src="{{asset('images/error.png')}}"> <!--For Error or Wrong, if can not fetch data into database-->
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">Cancel</button>
                    <button id="serviceEditConfirmBtn" type="button" class="btn btn-sm btn-success">Save</button>
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
            axios.get('/getProductOrderData').then(function(response) {
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
                            "<td>" + jsonData[i].invoice_no+ "</td>" +
                            "<td>" + "Product Name:" + jsonData[i].product_name+ "</br>" + "Product Code:" + jsonData[i].product_code+ "</td>" +
                            "<td>" + "Shop Name:" + jsonData[i].shop_name+ "</br>" + "Shop Code:" + jsonData[i].shop_code+ "</td>" +
                            "<td>" + jsonData[i].product_info+ "</td>" +
                            "<td>" + "Product quantity:" + jsonData[i].product_quantity+ "Unit Price:" + jsonData[i].unit_price+ "</br>" + "Total Price:" + jsonData[i].total_price+ "</td>" +
                            "<td>" + "Mobile:" + jsonData[i].mobile+ "</br>" + "Name:" + jsonData[i].name+ "Payment Method:" + jsonData[i].payment_method+ "</br>" + "Address:" + jsonData[i].delivery_address+ "</br>" + "City:" + jsonData[i].city + "</br>" + "Delivery charge:" + jsonData[i].delivery_charge+ "Order date:" + jsonData[i].order_date+ "</br>" + "Time:" + jsonData[i].order_time+"</td>" +
                            "<td>" + jsonData[i].order_status+ "</td>" +
                            "<td><a class='serviceEditBtn' data-id="+jsonData[i].id+"><i class='fas fa-edit'></i></a></td>" +
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

                    //For Services Table Edit Icon Click
                    $('.serviceEditBtn').click(function() {
                        var id = $(this).data('id');
                        $('#serviceEditId').html(id);
                        getServiceUpdateDetails(id);
                        $('#editModal').modal('show');
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
            axios.post('/productOrderDelete', {id: deleteID}).then(function(response) {
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




        //For Each Services Update Details
        function getServiceUpdateDetails(detailsID) {
            axios.post('/getProductOrderDetails', {id: detailsID}).then(function(response) {
                if(response.status== 200){

                    $('#serviceEditForm').removeClass('d-none');
                    $('#serviceEditLoader').addClass('d-none');

                    var jsonData = response.data;
                    $('#OrderStatusID').val(jsonData[0].order_status);
                } else{
                    $('#serviceEditLoader').addClass('d-none');
                    $('#serviceEditError').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditError').removeClass('d-none');
            });
        }




        //For Services Edit Modal Save Button
        $('#serviceEditConfirmBtn').click(function() {
            var id = $('#serviceEditId').html();
            var OrderStatusID = $('#OrderStatusID').val();
            getServiceUpdate(id, OrderStatusID);
        })
        //For Services Update
        function getServiceUpdate(serviceID, OrderStatusID) {
            if(OrderStatusID.length == 0){
                toastr.error('Service Name is empty !');
            } else{
                $('#serviceEditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //For loading animation
                axios.post('/productOrderUpdate', {id: serviceID, order_status:OrderStatusID,}).then(function(response) {
                    $('#serviceEditConfirmBtn').html("Save"); //For loading animation
                    if(response.status == 200){
                        if (response.data == 1) {
                            $('#editModal').modal('hide');
                            toastr.success('Data Update Successfully.');
                            getServicesData();
                        } else {
                            $('#editModal').modal('hide');
                            toastr.error('Data Update Failed.');
                            getServicesData();
                        }
                    } else{
                        $('#editModal').modal('hide');
                        toastr.error('Something Went Wrong !');
                    }
                }).catch(function(error) {
                    $('#editModal').modal('hide');
                    toastr.error('Something Went Wrong !');
                });
            }
        }
    </script>
@endsection
