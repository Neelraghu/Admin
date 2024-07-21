@extends('admin.layouts.default')
@section('title', 'like.minded')
@section('content')
<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
<div class="kt-container  kt-container--fluid ">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">Dashboard</h3>

    </div>

</div>
</div>

<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

<!--Begin::Dashboard 1-->

<!--Begin::Row-->
<div class="row">
    <div class="col-lg-12 col-xl-4 order-lg-1 order-xl-1">

        <!--begin:: Widgets/Activity-->
        <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
            <div class="kt-portlet__body--fit">
                <div class="kt-widget17">
                    <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                        <div class="kt-widget17__chart" style="height:1px;">

                        </div>
                    </div>
                    <div class="kt-widget17__stats" style="margin: -4.3rem auto 2.3rem auto;">
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <a href="{{ route('admin.users.index') }}">
                                    <span class="kt-widget17__icon">
                                        <span class="kt-widget17__icon">
                                        <i class="fa fa-users text-success"></i>
                                        </span>
                                    </span>
                                    <span class="kt-widget17__subtitle">
                                        Users ({{ $users }})
                                    </span>
                                    <span class="kt-widget17__desc mt-2">
                                        Influencer ({{ $influencer }}) + Brand / Business ({{ $business }}) = Total ({{ $users }})  
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="kt-widget17__items">
                            <div class="kt-widget17__item">
                                <a href="{{route('admin.cmspages.index')}}">
                                    <span class="kt-widget17__icon">
                                        <span class="kt-widget17__icon">
                                        <i class="fa fa-cogs"></i>
                                        </span>
                                    </span>
                                    <span class="kt-widget17__subtitle">
                                        Cms Pages ({{ $cmspages }})
                                    </span>
                                    <span class="kt-widget17__desc">

                                    </span>
                                </a>
                            </div>
                            <div class="kt-widget17__item">
                                <a href="{{route('admin.settings.index')}}">
                                    <span class="kt-widget17__icon">
                                        <i class="fa fa-cog"></i>
                                    </span>
                                    <span class="kt-widget17__subtitle">
                                        Settings ({{ $settings }})
                                    </span>
                                    <span class="kt-widget17__desc">

                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end:: Widgets/Activity-->
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
            
    </div>
</div>

<!-- end:: Content -->
<div class="modal fade" id="contactus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content ajax_content"></div>
    </div>
</div>
@stop
@section('pagescript')
<script>


</script>
@endsection