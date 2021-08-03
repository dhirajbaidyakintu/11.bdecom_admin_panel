@extends('masterLayout.app')
@section('title', 'Contact')
@section('content')
    <div id="mainDivContact" class="container-fluid d-none table-color">
        <div class="col-md-12">
            <h4 class="text-center text-success">CONTACT</h4>
        </div>
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm"><strong>Name</strong></th>
                        <th class="th-sm"><strong>Mobile</strong></th>
                        <th class="th-sm"><strong>Message</strong></th>
                        <th class="th-sm"><strong>Contact Date</strong></th>
                        <th class="th-sm"><strong>Contact Time</strong></th>
                        <th class="th-sm"><strong>Delete</strong></th>
                    </tr>
                    </thead>
                    <tbody id="contact_table">
                        <!--Go To Your JavaScript getContactData() function, here i get data using axios and make a Row & Column For This Table-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!--For Loading Animation-->
    <div id="loaderDivContact" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loading-animaiton m-5" src="{{asset('images/loader.svg')}}">
            </div>
        </div>
    </div>




    <!--For Error or Wrong, if can not fetch data from database-->
    <div id="errorDivContact" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img src="{{asset('images/error.png')}}">
            </div>
        </div>
    </div>




    <!--For Contact Delete Modal-->
    <div class="modal fade" id="deleteContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-3 text-center modal-1">
                    <h5 class="mt-4 text-white">Do You Want To Delete?</h5>
                    <h5 id="contactDeleteId" class="mt-4 d-none">   </h5>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button id="contactDeleteConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">
        getContactData();

        //For Contact table to get data using axios
        function getContactData() {
            axios.get('/getContactData').then(function(response) {
                //For loading and error
                if (response.status = 200) {

                    $('#mainDivContact').removeClass('d-none');
                    $('#loaderDivContact').addClass('d-none');
                    $('#contactDataTable').DataTable().destroy();//When We Delete Any Data From DataTable, Datatable Must Clear Else Don't Update
                    $('#contact_table').empty();//When Data Update At This Time Table Must Empty Then Data Load

                    //For Contact table to get data using axios
                    var jsonData = response.data;
                    $.each(jsonData, function(i, item) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].name+ "</td>" +
                            "<td>" + jsonData[i].mobile+ "</td>" +
                            "<td>" + jsonData[i].message+ "</td>" +
                            "<td>" + jsonData[i].contact_data + "</td>" +
                            "<td>" + jsonData[i].contact_time + "</td>" +
                            "<td><a class='contactDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#contact_table')
                    });

                    //For Services Table Delete Icon Click
                    $('.contactDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#contactDeleteId').html(id);
                        $('#deleteContactModal').modal('show');
                    })

                    //For DataTable (Pagination & How Many Data Show In One Page)
                    $('#contactDataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');

                } else {
                    $('#loaderDivContact').addClass('d-none');
                    $('#errorDivContact').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#loaderDivContact').addClass('d-none');
                $('#errorDivContact').removeClass('d-none');
            });
        }




        //For Services Table Delete Modal Yes Button
        $('#contactDeleteConfirmBtn').click(function() {
            var id = $('#contactDeleteId').html();
            getContactDelete(id);
        })
        //For Delete Data
        function getContactDelete(deleteID) {
            $('#contactDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//Loading Animation
            axios.post('/contactDelete', {id: deleteID}).then(function(response) {
                $('#contactDeleteConfirmBtn').html("Yes");//Loading Animation
                if(response.status == 200){
                    if (response.data == 1) {
                        $('#deleteContactModal').modal('hide');
                        toastr.success('Data Delete Successfully');
                        getContactData();
                    } else {
                        //alert('Data Delete Failed');
                        $('#deleteContactModal').modal('hide');
                        toastr.error('Data Delete Failed');
                        getContactData();
                    }
                }else{
                    $('#deleteContactModal').modal('hide');
                    toastr.error('Something Went Wrong !');
                }
            }).catch(function(error) {
                $('#deleteContactModal').modal('hide');
                toastr.error('Something Went Wrong !');
            });
        }
    </script>
@endsection















