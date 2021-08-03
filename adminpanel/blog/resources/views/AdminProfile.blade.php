@extends('masterLayout.app')
@section('title', 'Admin Profile')
@section('content')

    <!--Admin Profile Div -->
    <div class="container-fluid table-color">
        <h3 class="text-center text-success">Admin Profile</h3>
        <hr>
            <h5 id="AdminName" class="ml-1">Name:</h5>
            <h5 id="AdminEmail" class="ml-1">Email:</h5>
            <h5 id="AdminUserName" class="ml-1">User Name:</h5>
            <h5 id="AdminNumber" class="ml-1">Number:</h5>
            <button id="UpdateProfileBtn" class="btn btn-sm btn-slack">Update Profile</button>
        <hr>
    </div>

    <!--Admin Table Div -->
    <div id="AdminMainDiv" class="container-fluid d-none table-color">
        <div class="row">
            <div class="col-md-12 addButton">
                <button id="AdminAddNewBtn" class="btn btn-sm btn-slack ml-2">Add New Admin</button>
            </div>
            <div class="col-md-12 pt-0 pl-4 pr-4 pb-3">
                <table id="AdminProfileTableDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm"><strong>Admin Name</strong></th>
                        <th class="th-sm"><strong>Email</strong></th>
                        <th class="th-sm"><strong>UserName</strong></th>
                        <th class="th-sm"><strong>Number</strong></th>
                        <th class="th-sm"><strong>Delete</strong></th>
                    </tr>
                    </thead>
                    <tbody id="AdminProfile_Table">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Loader Div -->
    <div id="AdminLoaderDiv" class="container">
        <div class="row">
            <div class="col-md-12 text-center mt-5 p-5">
                <img class="loading-icon" src="{{asset('images/loader.svg')}}" alt="">
            </div>
        </div>
    </div>

    <!--Wrong Div -->
    <div id="AdminWrongDiv" class="container d-none">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h3>Something Went Wrong !</h3>
            </div>
        </div>
    </div>

    <!-- Admin Delete Modal -->
    <div class="modal fade" id="AdminDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Do you want to Delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <h4 class="text-white" id="AdminDeleteModalUserName"> </h4>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="AdminDeleteConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!--AddAdmin Profile Modal -->
    <div class="modal fade" id="AddAdminProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-1">
                    <label class="text-white">Name</label>
                    <input id="AddAdminName" type="text" class="form-control mb-2" placeholder="Your Name">
                    <label class="text-white">Email</label>
                    <input id="AddAdminEmail" type="email" class="form-control mb-2" placeholder="Your Email">
                    <label class="text-white">UserName</label>
                    <input id="AddAdminUserName" type="text" class="form-control mb-2" placeholder="Your UserName">
                    <label class="text-white">PassWord</label>
                    <input id="AddAdminPassWord" type="password" class="form-control mb-1" placeholder="Your Password">
                    <input type="checkbox" class="mb-3" onclick="myFunctionAddAdmin()"><span class="ml-1 text-white">Show Password</span><br>
                    <label class="text-white">Number</label>
                    <input id="AddAdminNumber" type="text" class="form-control mb-2" placeholder="Your Number">
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="AddAdminProfileConfBtn" type="button" class="btn btn-sm btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!--Update Profile Modal -->
    <div class="modal fade" id="UpdateProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Update Your Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body modal-1">
                    <label class="text-white">Name</label>
                    <input id="NameUpdate" type="text" class="form-control mb-2" placeholder="Name">
                    <label class="text-white">Email</label>
                    <input id="EmailUpdate" type="email" class="form-control mb-2" placeholder="Email">
                    <label class="text-white">Password</label>
                    <input id="PassWordUpdate" type="password" class="form-control mb-1" placeholder="Password">
                    <input type="checkbox" class="mb-3" onclick="myFunction()"><span class="ml-1 text-white">Show Password</span><br>
                    <label class="text-white">Number</label>
                    <input id="NumberUpdate" type="text" class="form-control mb-2" placeholder="Your Number">
                </div>

                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="UpdateProfileConfBtn" type="button" class="btn btn-sm btn-success">Update</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">
        getAdmin();
    </script>

@endsection
