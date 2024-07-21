@extends('admin.layouts.default')
@section('title', 'Industry Sub Category List')
@section('content')

<link href="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Industry Sub Category List</h3>
        </div>
        {{-- <div class="kt-subheader__toolbar">
            <a href="{{route('admin.settings.create')}}" class="btn btn-primary btn-bold"><i class="fa fa-plus"></i> Add New</a>
        </div> --}}
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            @include('admin.theme.includes.message')
            
            <form id="myForm">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <select class="form-control" name="category_id">
                            @if(!isset($create))
                            <option value="">Select category</option>
                            @endif
                            @foreach($category as $key)
                            <option value="{{ $key->id }}" @if(isset($edit) && $edit->category_id == $key->id) selected="" @endif>{{ $key->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter sub category name"@if(isset($edit)) value="{{ $edit->name }}" @endif>
                    </div>
                    <div class="col-md-4 form-group">
                        @if(isset($edit)) 
                            <input type="hidden" name="id" value="{{ $edit->id }}"> 
                            <input type="submit" class="btn btn-warning btn-bold" value="Update">
                            <a href="{{ route('admin.subcategory.index') }}" class="btn btn-danger btn-bold">Back</a>
                        @else 
                            <input type="submit" class="btn btn-primary btn-bold" value="Add New">
                        @endif
                        
                        @if(isset($create))
                            <a href="{{ route('admin.category.index') }}" class="btn btn-danger btn-bold">Back</a>
                        @endif
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ajax_content"></div>
        </div>
    </div>
</div>
<!-- end:: Content -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            @include('admin.theme.includes.message')
            <!--begin: Datatable -->
            <table class="table data-table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="100px">{{__('action')}}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!--end: Datatable -->
        </div>
    </div>

    <div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ajax_content"></div>
        </div>
    </div>
</div>
<!-- end:: Content -->
@stop

@section('pagescript')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<!--end::Page Vendors -->
<script>
$(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.subcategory.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category', name: 'category'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {

        }
    });

    $(document).on('click', '.status_change', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: id,
            type: 'GET',
            success: function (result) {
                if (result.status == true) {
                    toastr.success(result.Message);
                    table.draw(true);
                } else {
                    toastr.error(result.Message);
                }
            }
        });
    });
    
    $('#myForm').submit(function(e){

        e.preventDefault();

        var formData = new FormData(this);

        var url = "{{ route('admin.subcategory.store') }}";

        $.ajax({

            url: url,

            type: 'POST',

            data:formData,

            cache:false,

            contentType: false,

            processData: false,

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            success: function (result) {

                if (result.status == false) {

                    $.each(result.data, function( key, value) {

                       toastr.error(value);

                    });

                } else {
                    toastr.success(result.msg);
                    table.draw(true);
                    @if(!isset($edit))
                        $("#myForm")[0].reset();
                    @endif
                }

            }

        });
    });
});

</script>
@endsection