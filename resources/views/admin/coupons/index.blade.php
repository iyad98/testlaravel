@extends('admin.layout.layout')
@section('style')

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('assets/admin/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>

    <!--end::Page Vendors Styles-->
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
                    All Coupons                            </h5>
                <!--end::Actions-->
                <!--begin::Button-->
                <a href="{{route('admin.coupons.create')}}" class="position-absolute  btn btn-success font-weight-bold btn-pill" style="right: 30px">
                    <i class="far fa-plus-square"></i>
                      Add New Coupon
                </a>
                <!--end::Button-->
            </div>
            <!--end::Info-->


        </div>
    </div>
@endsection
@section('content')

    @include('admin.include.alert.success')

    <div class="card card-custom mx-5">
                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            Coupons
                            <div class="text-muted pt-2 font-size-sm">ALl Coupons</div>
                        </h3>
                    </div>
                    <div class="card-toolbar">



                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>code</th>
                            <th>rate</th>
                            <th>status</th>
                            <th>options</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php $i = 0?>
                        @if(isset($coupons) && count($coupons) > 0)
                            @foreach($coupons as $coupon)
                                <?php $i++ ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                {{$coupon->code}}
                            </td>
                            <td>{{$coupon->rate}}</td>

                            <td class="{{$coupon->getStatus() == 'مفعل' ? 'text-success' : 'text-danger'}}">{{$coupon->getStatus()}}</td>
                            <td>

                                <a href="{{route('admin.products.edit' , $coupon->id)}}" class="btn btn-icon btn-outline-dark btn-circle mr-2"><i class="far fa-edit"></i></a>
                                <form action="{{route('admin.products.destroy' , $coupon->id)}}" method="post" style="display: inline-table">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-icon btn-outline-danger btn-circle mr-2"><i class="flaticon-delete"></i></button>

                                </form>                            </td>
                        </tr>
                            @endforeach
                        @endif

                        </tbody>

                    </table>
                    <!--end: Datatable-->
                </div>
            </div>


@endsection
@section('script')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Page Vendors-->


@endsection
