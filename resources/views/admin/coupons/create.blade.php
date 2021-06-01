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
                    Coupons                            </h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Add Coupons                            </h5>
                <!--end::Actions-->
            </div>
            <!--end::Info-->


        </div>
    </div>
@endsection
@section('content')
    <!--begin::Form-->

    <form method="post" action="{{route('admin.coupons.store')}}" enctype="multipart/form-data">
        @csrf

    <div class="row m-5">
        <div class="col-lg-12">
    <div class="card card-custom h-100">
        <div class="card-header">
            <h3 class="card-title">
                Details
            </h3>
            <button  class=" position-absolute btn btn-success font-weight-bold btn-pill" style="right: 20px; top: 15px" >
                <i class="far fa-plus-square"></i>
                Save</button>

        </div>
                <div class="gutter-b">

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-3 col-form-label">code </label>
                            <input type="text" class="form-control col-9" name="code"/>
                        </div>

                        <div class="form-group row">
                            <label class="col-3 col-form-label">rate </label>
                            <input type="text" class="form-control col-9" name="rate"/>
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

    </div>


        <!--end::Form-->






    {{--submit form--}}

    </form>


@endsection
@section('script')






@endsection
