@extends('admin.layouts.default')
@section('title', 'Settings')
@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@if(isset($edit)) Edit @else Add @endif Settings</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.settings.index')}}" class="btn btn-default btn-bold"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <form method="POST" enctype="multipart/form-data" action="{{route('admin.settings.store')}}" class="kt-form kt-form--label-right" _lpchecked="1">
                @csrf

                @if(isset($edit))
                    <input type="hidden" name="id" value="{{ $edit->id }}">
                @endif
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Key : </label>
                            <input type="text" class="form-control" placeholder="Enter key" name="key" @if(isset($edit)) disabled="" value="{{ $edit->key }}" @else  value="{{ old('key') }}" @endif>
                            @if(!isset($edit))
                            <span class="form-text text-muted">Please enter your key</span>
                            @endif
                            @if ($errors->has('key'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('key') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Value : </label>
                            <input type="text" class="form-control" placeholder="Enter value" name="value" @if(isset($edit)) value="{{ $edit->value }}" @else value="{{ old('value') }}" @endif>
                            <span class="form-text text-muted">Please enter your value</span>
                            @if ($errors->has('value'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('value') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary reset">Reset</button>
                            </div>
                        </div>
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
@stop

@section('pagescript')

<script>
   $(".reset").click(function () {
       $('.kt-form').find("input[type=text], textarea").val("");
   });
</script>
@endsection