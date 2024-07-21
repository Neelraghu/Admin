@extends('admin.layouts.default')
@section('title', 'User Edit')
@section('content')

<link href="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<style>
    .help-block{
        color: red !important;
    }
</style>

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Edit User</h3>
<!--            <span class="kt-subheader__separator kt-subheader__separator--v"></span>-->

        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.users.index')}}" class="btn btn-default btn-bold"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">

            <div class="m-portlet m-portlet--tabs">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-tools">
                        <ul class="nav nav-tabs m-tabs-line m-tabs-line--success m-tabs-line--2x" role="tablist">
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#general" role="tab">
                                    <i class="la la-user"></i>
                                    General
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#social" role="tab">
                                    <i class="la la-comments"></i>
                                    Social
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#contact" role="tab">
                                    <i class="la la-users"></i>
                                    Contacts
                                </a>
                            </li>
                            @if($editdata->type != "business")
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#location" role="tab">
                                    <i class="la la-location-arrow"></i>
                                    Locations
                                </a>
                            </li>
                            @endif
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#review" role="tab">
                                    <i class="la la-star-o"></i>
                                    Review
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#portfolio" role="tab">
                                    <i class="la la-image"></i>
                                    Portfolio
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#search" role="tab">
                                    <i class="la la-search"></i>
                                    Search
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#reminder" role="tab">
                                    <i class="la la-bell"></i>
                                    Reminder
                                </a>
                            </li>
                            <li class="nav-item m-tabs__item">
                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#industry" role="tab">
                                    <i class="la la-align-justify"></i>
                                    Industry
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="m-portlet__body">
                    <div class="tab-content">
                        
                        @include('admin.pages.users.tabs.general')
                        @include('admin.pages.users.tabs.social')
                        
                        <div class="tab-pane" id="contact" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_contact">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>First name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Favourite</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane" id="location" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_location">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Location</th>
                                        <th>latitude</th>
                                        <th>longitude</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane" id="review" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_review">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Company</th>
                                        <th>Position</th>
                                        <th>Rate</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="tab-pane" id="portfolio" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_portfolio">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>File</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="search" role="tabpanel">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label>Search list for</label>
                                    <select class="form-control search_type">
                                        <option value="saved">Saved Search</option>
                                        <option value="deleted">Deleted Search</option>
                                    </select>
                                </div>
                            </div>
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_search">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>DateTime</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="tab-pane" id="reminder" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_reminder">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>For User</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="industry" role="tabpanel">
                            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_industry">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Content -->
@stop

@section('pagescript')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<!--end::Page Vendors -->

@include('admin.pages.users.editscript')

@endsection