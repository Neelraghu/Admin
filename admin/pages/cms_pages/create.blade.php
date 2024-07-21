@extends('admin.layouts.default')
@section('title', 'CMS Page')
@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@if(isset($edit)) Edit @else Create New @endif  CMS Page</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.cmspages.index')}}" class="btn btn-default btn-bold"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.cmspages.store')}}" class="kt-form kt-form--label-right" _lpchecked="1">
                @csrf
                @if(isset($edit))
                <input type="hidden" name="id" value="{{ $edit->id }}">
                @endif
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Name:</label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name" @if(isset($edit)) value="{{ $edit->name }}" @else value="{{ old('name') }}" @endif >
                                   <span class="form-text text-muted">Please enter name</span>
                            @if ($errors->has('name'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Title:</label>
                            <input type="text" class="form-control" placeholder="Enter title" name="title" @if(isset($edit)) value="{{ $edit->title }}" @else value="{{ old('title') }}" @endif>
                                   <span class="form-text text-muted">Please enter title</span>
                            @if ($errors->has('title'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('title') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Sub title:</label>
                            <input type="text" class="form-control" placeholder="Enter sub title" name="sub_title" @if(isset($edit)) value="{{ $edit->sub_title }}" @else value="{{ old('sub_title') }}" @endif>
                                   <span class="form-text text-muted">Please enter sub title</span>
                            @if ($errors->has('sub_title'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('sub_title') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Meta Title:</label>
                            <input type="text" class="form-control" placeholder="Enter meta title" name="meta_title" @if(isset($edit)) value="{{ $edit->meta_title }}" @else value="{{ old('meta_title') }}" @endif>
                                   <span class="form-text text-muted">Please enter meta title</span>
                            @if ($errors->has('meta_title'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('meta_title') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-6">
                            <label>Meta Keyword:</label>
                            <input type="text" class="form-control" placeholder="Enter meta keyword" name="meta_keyword" @if(isset($edit)) value="{{ $edit->meta_keyword }}" @else value="{{ old('meta_keyword') }}" @endif>
                                   <span class="form-text text-muted">Please enter meta keyword</span>
                            @if ($errors->has('meta_keyword'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('meta_keyword') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Meta Description:</label>
                            <textarea class="form-control" placeholder="Enter meta description" name="meta_description">@if(isset($edit)) {{ $edit->meta_description }} @else {{ old('meta_description') }} @endif </textarea> 
                            <span class="form-text text-muted">Please enter meta description</span>
                            @if ($errors->has('meta_description'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('meta_description') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Short Description:</label>
                            <textarea class="form-control" placeholder="Enter short description" name="short_description">@if(isset($edit)) {{ $edit->short_description }} @else {{ old('short_description') }} @endif</textarea> 
                            <span class="form-text text-muted">Please enter short description</span>
                            @if ($errors->has('short_description'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('short_description') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Description:</label>
                            <textarea class="form-control ckeditor" placeholder="Enter description" name="description">@if(isset($edit)) {{ $edit->description }} @else {{ old('description') }} @endif</textarea> 
                            <span class="form-text text-muted">Please enter description</span>
                            @if ($errors->has('description'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Image:</label>
                            <input type="file" class="form-control dropify" placeholder="Enter image" name="image" id="image" @if(isset($edit) && !empty($edit->image)) data-default-file="{{ url('sitebucket/cms_pages')."/".$edit->image }}" @endif>
                                   <span class="form-text text-muted">Please enter image</span>
                            @if ($errors->has('image'))
                            <div style="display: block;" id="email-error" class="error invalid-feedback">{{ $errors->first('image') }}</div>
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