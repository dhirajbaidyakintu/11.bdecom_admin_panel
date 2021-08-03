@extends('masterLayout.app')
@section('title', 'Category & SubCategory')
@section('content')

    <div class="container-fluid" style="background-color: #F0F8FF">
        <div class="col-md-12">
            <h4 class="text-center mb-3 text-success">CATEGORY & SUB-CATEGORY</h4>
        </div>
        <div class="row">
            <!--Category part -->
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label mt-3 ml-2 text-dark">Add Category</label>
                    <input id="AddCategory" type="text" class="form-control ml-1" placeholder="Add Category">
                    <label class="form-label mt-2 ml-2 text-dark">Add Category Image URL</label>
                    <input id="AddCategoryImg" type="text" class="form-control ml-1" placeholder="Add Category Image URL">
                    <button id="AddCategoryBtn" class="btn btn-slack btn-light-green mt-3">Add Category</button>
                </div>

                <div class="mb-3">
                    <label class="form-label ml-1 text-dark">Category List</label>
                    <div id="CategoryList" class="ml-1">
                    </div>
                </div>
            </div>


            <!--SubCategory part -->
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label mt-3 ml-1 text-dark">Category</label>
                    <select id="AddSubItemCategory" class="form-select w-100 ml-1">
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label ml-1 text-dark">Add SubCategory</label>
                    <input id="AddSubCategory" type="text" class="form-control ml-1" placeholder="Add SubCategory">
                    <button id="AddSubCategoryBtn" class="btn btn-slack btn-green mt-3">Add SubCategory</button>
                </div>

                <div class="mb-3">
                    <label class="form-label mt-3 ml-1 text-dark">Category</label>
                    <select id="Category" class="form-select w-100 text-dark ml-1">

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label ml-1 text-dark">SubCategory List</label>
                    <div id="SubCategoryList">
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label mt-3 ml-1 text-dark">Delete Category</label>
                    <select id="DeleteCategory" class="form-select w-100 text-dark ml-1">

                    </select>
                    <button id="DeleteCategoryBtn" class="btn btn-slack btn-danger mt-3">Delete Category</button>
                </div>


                <div class="mb-3">
                    <label class="form-label mt-3 text-dark ml-1">Delete SubCategory</label>
                    <div class="row">
                        <div class="col-6">
                            <select id="DeleteSubItemCategory" class="form-select w-100 text-dark ml-1">
                            </select>
                        </div>

                        <div class="col-6">
                            <select id="DeleteSubCategory" class="form-select w-100">
                            </select>
                        </div>
                    </div>
                    <button id="DeleteSubCategoryBtn" class="btn btn-slack btn-danger mt-3">Delete SubCategory</button>
                </div>

            </div>


        </div>

        <div class="row">
            <div class="col-5">
                <div class="mb-3">

                </div>
            </div>
        </div>


        <div class="row">

        </div>
        <div class="row">

        </div>
        <div class="row">

        </div>
    </div>



    <!--Delete Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p id="DeleteModalCategory"> </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button id="DeleteConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Delete SubCategory Modal -->
    <div class="modal fade" id="DeleteSubCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p id="DeleteModalSubCategory"> </p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">No</button>
                    <button id="DeleteSubCategoryConfirmBtn" type="button" class="btn btn-sm btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>





@endsection

@section('script')

    <script type="text/javascript">
        getCategory();
        
        function getCategory(){
            SelectOptionCategory();
            SelectAddSubItemCategory();
            SelectOptionDeleteCategory();
            SelectOptionDeleteSubCategory();
            axios.get('/SelectOptionCategory').then(function (response){
                if(response.status==200){
                    var JsonData = response.data;
                    $('#CategoryList').empty();
                    $.each(JsonData, function (i, item) {
                        $('<ul class="list-group">').html(
                            '<li class="list-group-item"><img src="'+JsonData[i].cat1_img+'" class="categoryImg"> '+JsonData[i].cat1_name+'</li>'
                        ).appendTo('#CategoryList');
                    })

                }else {

                }
            }).cache(function (error){

            })
        }



        function SelectOptionCategory() {
            axios.get('/SelectOptionCategory').then(function (response) {
                var JsonData = response.data;
                $('#Category').empty();
                $.each(JsonData, function (i, item) {
                    $('<option value="' + JsonData[i].cat1_name + '">').html(
                        JsonData[i].cat1_name
                    ).appendTo('#Category');
                });
            })

            $('#Category').on('change',function (e){
                var CategoryName = e.target.value;
                axios.post('/SelectSubCategory',{'CategoryName':CategoryName}).then(function (response){
                    var JsonData = response.data;
                    $('#SubCategoryList').empty();
                    $.each(JsonData, function (i, item) {
                        $('<ul class="list-group">').html(
                            '<li class="list-group-item">'+JsonData[i].cat2_name+'</li>'
                        ).appendTo('#SubCategoryList');
                    });
                })
            })
        }


        //Add New Category  Btn
        $('#AddCategoryBtn').click(function () {
            //ProductDetails Model Catch
            var cat1_name = $('#AddCategory').val();
            var cat1_image = $('#AddCategoryImg').val();
            AddCategory(cat1_name,cat1_image);
            $('#AddCategory').val(null);
            $('#AddCategoryImg').val(null);
            $('#AddSubCategory').val(null);
            $('#DeleteSubCategory').empty();
            $('#SubCategoryList').empty();
        });

        function AddCategory(cat1_name,cat1_image){
            if(cat1_name.length==0){
                toastr.error('Category Name is Empty');
            }else if(cat1_image.length==0){
                toastr.error('Category Image is Empty');
            }else {
                $('#AddCategoryBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animation...
                axios.post('/AddCategoryList',{
                    cat1_name:cat1_name,
                    cat1_image:cat1_image
                }).then(function (response) {
                    $('#AddCategoryBtn').html("Add New");
                    if(response.status==200){
                        toastr.success('Category Add Success');
                        getCategory();
                    }else{
                        $('#AddCategoryBtn').html("Add New");
                        toastr.error('Something Went Wrong');
                    }
                })
            }
        }

        //Add New Add Sub Item Category Select Option
        function SelectAddSubItemCategory() {
            axios.get('/SelectOptionCategory').then(function (response) {
                var JsonData = response.data;
                $('#AddSubItemCategory').empty();
                $.each(JsonData, function (i, item) {
                    $('<option value="' + JsonData[i].cat1_name + '">').html(
                        JsonData[i].cat1_name
                    ).appendTo('#AddSubItemCategory');
                });
            })
        }


        //Add New SubCategory  Btn
        $('#AddSubCategoryBtn').click(function () {
            //ProductDetails Model Catch
            var cat1_name =$('#AddSubItemCategory').val();
            var cat2_name =$('#AddSubCategory').val();
            AddSubCategory(cat1_name,cat2_name);
            $('#AddCategory').val(null);
            $('#AddCategoryImg').val(null);
            $('#AddSubCategory').val(null);
            $('#DeleteSubCategory').empty();
            $('#SubCategoryList').empty();
        });

        function AddSubCategory(cat1_name,cat2_name){
            if(cat1_name.length==0){
                toastr.error('Category Name is Empty');
            }else if(cat2_name.length==0){
                toastr.error('SubCategory Image is Empty');
            }else {
                $('#AddSubCategoryBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animation...
                axios.post('/AddSubCategoryList',{
                    cat1_name:cat1_name,
                    cat2_name:cat2_name
                }).then(function (response) {
                    $('#AddSubCategoryBtn').html("Add SubCategory");
                    if(response.status==200){
                        toastr.success('Category Add Success');
                        getCategory();
                    }else{
                        $('#AddSubCategoryBtn').html("Add SubCategory");
                        toastr.error('Something Went Wrong');
                    }
                })
            }
        }

        //Delete Category Select Option
        function SelectOptionDeleteCategory() {
            axios.get('/SelectOptionCategory').then(function (response) {
                var JsonData = response.data;
                $('#DeleteCategory').empty();
                $.each(JsonData, function (i, item) {
                    $('<option value="' + JsonData[i].cat1_name + '">').html(
                        JsonData[i].cat1_name
                    ).appendTo('#DeleteCategory');
                });
            })
        }

        //Category Delete Btn
        $('#DeleteCategoryBtn').click(function () {
            var cat1_name =$('#DeleteCategory').val();

            $('#DeleteModalCategory').html(cat1_name);
            $('#DeleteModal').modal('show');
        });


        //Service Delete Yes Btn
        $('#DeleteConfirmBtn').click(function () {
            var cat1_name =$('#DeleteCategory').val();
            DeleteCategory(cat1_name);
            $('#AddCategory').val(null);
            $('#AddCategoryImg').val(null);
            $('#AddSubCategory').val(null);
            $('#DeleteSubCategory').empty();
            $('#SubCategoryList').empty();
        });

        // Get Delete Category Function
        function DeleteCategory(cat1_name){

            $('#DeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animation...

            axios.post('/DeleteCategory',{cat1_name:cat1_name})
                .then(function (response) {
                    $('#DeleteConfirmBtn').html("Yes");
                    if(response.status==200){
                        $('#DeleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getCategory();
                    } else {
                        $('#DeleteModal').modal('hide');
                        toastr.error('Delete Fail');
                    }
                })
        }





        //Delete SubCategory Code

        function SelectOptionDeleteSubCategory() {
            axios.get('/SelectOptionCategory').then(function (response) {
                var JsonData = response.data;
                $('#DeleteSubItemCategory').empty();
                $.each(JsonData, function (i, item) {
                    $('<option value="' + JsonData[i].cat1_name + '">').html(
                        JsonData[i].cat1_name
                    ).appendTo('#DeleteSubItemCategory');
                });
            })

            $('#DeleteSubItemCategory').on('change',function (e){
                var CategoryName = e.target.value;
                axios.post('/SelectSubCategory',{'CategoryName':CategoryName}).then(function (response){
                    var JsonData = response.data;
                    $('#DeleteSubCategory').empty();
                    $.each(JsonData, function (i, item) {
                        $('<option value="' + JsonData[i].cat2_name + '">').html(
                            JsonData[i].cat2_name
                        ).appendTo('#DeleteSubCategory');
                    });
                })
            })
        }


        //Category Delete Btn
        $('#DeleteSubCategoryBtn').click(function () {
            var cat2_name =$('#DeleteSubCategory').val();

            $('#DeleteModalSubCategory').html(cat2_name);
            $('#DeleteSubCategoryModal').modal('show');
        });


        //Service Delete Yes Btn
        $('#DeleteSubCategoryConfirmBtn').click(function () {
            var cat1_name =$('#DeleteSubItemCategory').val();
            var cat2_name =$('#DeleteSubCategory').val();
            DeleteSubCategory(cat1_name,cat2_name);
            $('#AddCategory').val(null);
            $('#AddCategoryImg').val(null);
            $('#AddSubCategory').val(null);
            $('#DeleteSubCategory').empty();
            $('#SubCategoryList').empty();
        });

        // Get Delete Category Function
        function DeleteSubCategory(cat1_name,cat2_name){

            $('#DeleteSubCategoryConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //Animation...

            axios.post('/DeleteSubCategory',{
                cat1_name:cat1_name,
                cat2_name:cat2_name,
            })
                .then(function (response) {
                    $('#DeleteSubCategoryConfirmBtn').html("Yes");
                    if(response.status==200){
                        $('#DeleteSubCategoryModal').modal('hide');
                        toastr.success('Delete Success');
                        getCategory();

                    } else {
                        $('#DeleteSubCategoryModal').modal('hide');
                        toastr.error('Delete Fail');
                    }
                })
        }

    </script>

@endsection
