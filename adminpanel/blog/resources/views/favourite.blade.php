@extends('masterLayout.app')
@section('title', 'Favourite')
@section('content')
    <div id="mainDivReview" class="container-fluid d-none table-color">
        <div class="col-md-12">
            <h4 class="text-center text-success">FAVOURITE PRODUCTS</h4>
        </div>
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Favourite Title</th>
                        <th class="th-sm">Image</th>
                        <th class="th-sm">Product Code</th>
                        <th class="th-sm">Mobile</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="review_table">
                    <!--Go To Your JavaScript getContactData() function, here i get data using axios and make a Row & Column For This Table-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!--For Loading Animation-->
    <div id="loaderDivReview" class="container">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img class="loading-animaiton m-5" src="{{asset('images/loader.svg')}}">
            </div>
        </div>
    </div>




    <!--For Error or Wrong, if can not fetch data from database-->
    <div id="errorDivReview" class="container d-none">
        <div class="row">
            <div class="col-md-12 p-5 text-center">
                <img src="{{asset('images/error.png')}}">
            </div>
        </div>
    </div>




    <!--For Review Delete Modal-->
    <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-3 text-center modal-1">
                    <h5 class="mt-4 text-white">Do You Want To Delete?</h5>
                    <h5 id="reviewDeleteId" class="mt-4 d-none">   </h5>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button id="reviewDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">
        getReviewsData();

        //For review table to get data using axios
        function  getReviewsData() {
            axios.get('/getFavData').then(function(response) {
                //For loading and error
                if (response.status = 200) {

                    $('#mainDivReview').removeClass('d-none');
                    $('#loaderDivReview').addClass('d-none');
                    $('#reviewDataTable').DataTable().destroy();//When We Delete Any Data From DataTable, Datatable Must Clear Else Don't Update
                    $('#review_table').empty();//When Data Update At This Time Table Must Empty Then Data Load

                    //For service table to get data using axios
                    var jsonData = response.data;
                    $.each(jsonData, function(i, item) {
                        $('<tr>').html(
                            "<td>" + jsonData[i].title+ "</td>" +
                            "<td><img class='table-img' src=" + jsonData[i].image+"></td>" +
                            "<td>" + jsonData[i].product_code+ "</td>" +
                            "<td>" + jsonData[i].mobile+ "</td>" +
                            "<td><a class='reviewDeleteBtn' data-id="+jsonData[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
                        ).appendTo('#review_table')
                    });

                    //For Review Table Delete Icon Click
                    $('.reviewDeleteBtn').click(function() {
                        var id = $(this).data('id');
                        $('#reviewDeleteId').html(id);
                        $('#deleteReviewModal').modal('show');
                    })

                    //For DataTable (Pagination & How Many Data Show In One Page)
                    $('#reviewDataTable').DataTable({"order":false});
                    $('.dataTables_length').addClass('bs-select');

                } else {
                    $('#loaderDivReview').addClass('d-none');
                    $('#errorDivReview').removeClass('d-none');
                }
            }).catch(function(error) {
                $('#loaderDivReview').addClass('d-none');
                $('#errorDivReview').removeClass('d-none');
            });
        }




        //For Review Table Delete Modal Yes Button
        $('#reviewDeleteConfirmBtn').click(function() {
            var id = $('#reviewDeleteId').html();
            getReviewDelete(id);
        })
        //For Delete Data
        function getReviewDelete(deleteID) {
            $('#reviewDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");//Loading Animation
            axios.post('/favDelete', {id: deleteID}).then(function(response) {
                $('#reviewDeleteConfirmBtn').html("Yes");//Loading Animation
                if(response.status == 200){
                    if (response.data == 1) {
                        //alert('Data Delete Successfully');
                        $('#deleteReviewModal').modal('hide');
                        toastr.success('Data Delete Successfully');
                        getReviewsData();
                    } else {
                        //alert('Data Delete Failed');
                        $('#deleteReviewModal').modal('hide');
                        toastr.error('Data Delete Failed');
                        getReviewsData();
                    }
                } else{
                    $('#deleteReviewModal').modal('hide');
                    toastr.error('Something Went Wrong!');
                }
            }).catch(function(error) {
                $('#deleteReviewModal').modal('hide');
                toastr.error('Something Went Wrong!');
            });
        }
    </script>
@endsection
