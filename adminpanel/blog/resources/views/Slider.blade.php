@extends('masterLayout.app')
@section('title', 'Slider')
@section('content')

    <div class="container-fluid table-color">
        <!--Slider Table Div -->
        <h4 class="text-success text-center">Slider</h4>
        <div id="SliderMainDiv" class="container d-none">
            <div class="row">
                <div class="col-md-12 addButton">
                    <button id="AddNewSliderBtnID" class="btn btn-sm btn-slack ml-2">Add New Slider</button>
                </div>
                <div class="col-md-12 pt-0 pl-4 pr-4 pb-3">
                    <table id="SliderTableDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm"><strong>Image</strong></th>
                            <th class="th-sm"><strong>Title</strong></th>
                            <th class="th-sm"><strong>Sub Title</strong></th>
                            <th class="th-sm"><strong>Details</strong></th>
                            <th class="th-sm"><strong>Delete</strong></th>
                        </tr>
                        </thead>
                        <tbody id="Slider_Table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Slider Loader Div -->
        <div id="SliderLoaderDiv" class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-5 p-5">
                    <img class="loading-icon" src="{{asset('images/loader.svg')}}" alt="">
                </div>
            </div>
        </div>

        <!-- Slider Wrong Div -->
        <div id="SliderWrongDiv" class="container d-none">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h3>Something Went Wrong !</h3>
                </div>
            </div>
        </div>
    </div>


    <!--Slider Delete Modal -->
    <div class="modal fade" id="SliderDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <p class="text-white" id="SliderDeleteModalId"></p>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                    <button data-id=" " id="SliderDeleteConfirmBtn" type="button" class="btn btn-sm btn-success">Yes</button>
                </div>
            </div>
        </div>
    </div>


    <!--Slider Edit Modal -->
    <div class="modal fade" id="SliderEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Slider Edit and Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-1">
                    <p class="d-none" id="SliderEditModalId"> </p>

                    <div id="SliderEditForm" class="d-none">
                        <div class="row">
                            <div class="col-8">
                                <!-- Slider Title Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Slider Title</label>
                                    <input type="text" id="SliderTitleId" class="form-control" placeholder="Course Name" />
                                </div>
                                <!-- Slider SubTitle Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Slider Sub-title</label>
                                    <input type="text" id="SliderSubTitleId" class="form-control" placeholder="Course Description" />
                                </div>
                                <!-- Slider Image Id-->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Image Link</label>
                                    <input type="text" id="SliderImageId" class="form-control" placeholder="Course Link" />
                                    <button class="mt-2 btn btn-sm btn-success" id="GallerySliderImage">Gallery</button>
                                </div>
                                <img id="SliderImageShow" src="http://localhost/images/product1.jpg" class="card-img-top w-50" alt=" ">
                            </div>


                            <div class="col-4">
                                <!-- Slider Text Color Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Text Color</label>
                                    <input type="text" id="SliderTextColorId" class="form-control" placeholder="Course image link" />
                                </div>

                                <!-- Slider BgColor Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Background Color</label>
                                    <input type="text" id="SliderBgColorId" class="form-control" placeholder="Course image link" />
                                </div>

                                <!-- Slider Product Code Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Product Code</label>
                                    <input type="text" id="SliderProductCodeId" class="form-control" placeholder="Course image link" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="SliderEditLoader" class="col-md-12 text-center">
                        <img class="loading-icon" src="{{asset('images/loader.svg')}}" alt="">
                    </div>

                    <div id="SliderEditWrong" class="col-md-12 text-center d-none">
                        <h3>Something Went Wrong !</h3>
                    </div>

                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">Cancel</button>
                    <button data-id=" " id="SliderEditConfirmBtn" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>



    <!--Add Slider  Modal -->
    <div class="modal fade" id="AddSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Add New Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body modal-1">
                    <p id="AddSliderModalId"> </p>

                    <div id="AddSliderForm" class=" ">
                        <div class="row">
                            <div class="col-8">
                                <!-- Add Slider Title Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Slider Title</label>
                                    <input type="text" id="AddSliderTitleId" class="form-control" placeholder="Slider Title" />
                                </div>
                                <!-- Add Slider Sub Title Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Slider Sub-title</label>
                                    <input type="text" id="AddSliderSubTitleId" class="form-control" placeholder="Slider Sub-title" />
                                </div>
                                <!-- Add Slider Image Id-->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Image Link</label>
                                    <input type="text" id="AddSliderImageId" class="form-control" placeholder="Image Link" />
                                    <button class="mt-2 btn btn-sm btn-success" id="AddGallerySliderImage">Gallery</button>
                                </div>
                                <img id="AddSliderImageShow" src="http://localhost/images/product1.jpg" class="card-img-top w-50" alt=" ">
                            </div>


                            <div class="col-4">
                                <!-- Add Slider Text Color Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Text Color</label>
                                    <input type="text" id="AddSliderTextColorId" class="form-control" placeholder="Text Color" />
                                </div>
                                <!-- Add Slider BgColor Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Background Color</label>
                                    <input type="text" id="AddSliderBgColorId" class="form-control" placeholder="Background Color" />
                                </div>
                                <!-- Add Slider Product Code Id -->
                                <div class="form-outline mb-2">
                                    <label class="text-white">Product Code</label>
                                    <input type="text" id="AddSliderProductCodeId" class="form-control" placeholder="Product Code" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-2">
                    <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">Cancel</button>
                    <button id="AddSliderConfirmBtn" type="button" class="btn btn-sm btn-success">Add New</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Gallery  Modal -->
    <div class="modal fade ModelZIndexTop" id="GallerySliderImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Photo Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <div class="row">
                        <div class="col-8 OverFlowScroll">
                            <div class="row photoGalleySliderImage">

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col">
                                    <div class="col flex-row">
                                        <img id="SelectedSliderImage" src="http://localhost/images/product1.jpg" class="card-img-top w-100" alt=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-2">
                        <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                        <button id="GallerySliderImageSetBtn" type="button" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add Gallery  Modal -->
    <div class="modal fade ModelZIndexTop" id="AddGallerySliderImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header modal-1">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Photo Gallery</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center modal-1">
                    <div class="row">
                        <div class="col-8 OverFlowScroll">
                            <div class="row AddphotoGalleySliderImage">

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row">
                                <div class="col">
                                    <div class="col flex-row">
                                        <img id="AddSelectedSliderImage" src="http://localhost/images/product1.jpg" class="card-img-top w-100" alt=" ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-2">
                        <button type="button" class="btn btn-sm btn-deep-orange" data-dismiss="modal">No</button>
                        <button id="AddGallerySliderImageSetBtn" type="button" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        getSliderData();
    </script>
@endsection
