@extends('admin.layout.layout')
@section('style')
    <style>
        .note-editor{
            width: 75%;
        }
    </style>
@endsection
@section('fixed-content-header')

    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    المنتجات                            </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    اضافة منتح                            </h5>
                <!--end::Actions-->
            </div>
            <!--end::Info-->


        </div>
    </div>
@endsection
@section('content')
    <!--begin::Form-->

    <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
        @csrf

    <div class="row m-5">
        <div class="col-lg-12">
    <div class="card card-custom h-100">
        <div class="card-header">
            <h3 class="card-title">
                تفاصيل عامة
            </h3>
            <button  class=" position-absolute btn btn-success font-weight-bold btn-pill" style="right: 20px; top: 15px" >
                <i class="far fa-plus-square"></i>
                حفظ</button>

        </div>
                <div class="gutter-b">

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Name </label>
                            <input type="text" class="form-control col-9" name="product_name"/>
                        </div>
                        <div class="form-group row">
                            <label class="col-3 col-form-label">Description</label>
                            <textarea class="summernote col-9" id="kt_summernote_1" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row m-4">
                        <label class="col-3 col-form-label">Status</label>
                        <div class="col-3">
							<span class="switch switch-outline switch-icon switch-dark">
								<label>
									<input type="checkbox" checked="checked" name="status"/>
									<span></span>
								</label>
							</span>
                        </div>
                    </div>


                </div>



    </div>
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card card-custom ">
                <div class="card-header">
                    <h3 class="card-title">

                        Price
                    </h3>

                </div>
                <div class=" gutter-b">

                    <div class="card-body">


                        <div class="form-group row">
                            <label class="col-3 col-form-label">Price</label>
                            <div class="col-9">
                                <input type="text" class="form-control " name="price" id="buy_price"  />

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-5">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">

                        Images
                    </h3>

                </div>
                <div class=" gutter-b">

                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-12">

                                <div class="file-loading ">
                                    <input type="file" name="images[]" id="post-images" class="file-input-overview" multiple>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>


        <!--end::Form-->






    {{--submit form--}}

    </form>


@endsection
@section('script')

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/admin/js/pages/crud/forms/editors/summernote.js')}}"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/admin/js/pages/crud/forms/widgets/select2.js')}}"></script>
    <!--end::Page Scripts-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets/admin/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
    <!--end::Page Scripts-->

    <script src="{{ asset('assets/admin/vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}"></script>

    <script src="{{ asset('assets/admin/vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap-fileinput/themes/fas/theme.min.js') }}"></script>
    <script>

        $('#post-images').fileinput({
            theme: "fas",
            maxFileCount: 10,
            allowedFileTypes: ['image'],
            showCancel: true,
            showRemove: false,
            showUpload: false,
            overwriteInitial: false,
        });
    </script>




@endsection
