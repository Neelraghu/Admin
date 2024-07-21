@extends('admin.layouts.default')
@section('title', 'Search Result')
@section('content')

<link href="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Search Result</h3>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.users.edit',$search->user_id)}}" class="btn btn-default btn-bold"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="search-head">
                        <div class="search-note">
                            <p>- Search Results for <b>@if($search['type'] == "influencer") an Influencer @else a Brnad / Business @endif</b>
                            </p>

                            @php 
                                $arrLocation = json_decode($search->search_json, true);
                                $miles = array_filter($arrLocation['location']['miles']);
                                $location = array_filter($arrLocation['location']['location']);
                            @endphp

                            @if(!empty($miles) && !empty($location))

                                @foreach ($location as $key => $value) 
                                    @if(!empty($value) && isset($miles[$key]) && !empty($miles[$key]))
                                        <p>- within <b>{{ $miles[$key] }} miles</b> from <b>{{ $value }} </b></p>
                                    @endif
                                @endforeach

                            @endif

                            @foreach($search_json as $key => $value)

                                <p>- Searching by 

                                <b>{{ $key }} </b> 

                                    @if($key == "Industry")
                                        of <b>{{ getSubCategoryString($value) }}</b>
                                    @else
                                        @if(is_array($value))

                                            @if(isset($value['from']) && isset($value['to']) && $value['from'] != "" && $value['to'] != "")

                                                from <b>{{ $value['from'] }}</b> to <b>{{ $value['to'] }}.</b>

                                            @endif

                                        @else

                                            @if($value != "")

                                                by <b>{{ $value }}.</b>

                                            @endif

                                        @endif
                                    @endif

                                </p>

                            @endforeach
                        </div>
                    </div>
                    <div class="table-responsive mt-5">
                        <table id="resultTable" class="table data-table table-striped- table-bordered table-hover table-checkable responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    @if(!empty($location))
                                    <th>Location</th>
                                    @endif

                                    @foreach($search_json as $key => $value)
                                        @if($key == "Key Words")
                                            <th>About</th>
                                        @else
                                            <th>{{ $key }}</th>
                                        @endif
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($data) != 0 )
                                    @foreach($data as $user)
                                        @if(!checkUserContact(Auth::id(),$user->id))
                                            <tr>
                                                <td>
                                                    <p><a href="{{route('admin.users.edit',$user->id)}}" title="view profile">{{ $user->first_name." ".$user->last_name }}</a></p>
                                                </td>
                                                <td>
                                                    <p>{{ $user->email }}</p>
                                                </td>
                                                @if(!empty($location))
                                                <td>
                                                    @if(!empty($arrLocation = getUserLocation($user->id)))
                                                        <p>{{ implode(' | ', $arrLocation) }}</p>
                                                    @endif
                                                </td>
                                                @endif

                                                @foreach($search_json as $key => $value)
                                                <td>

                                                    @switch($key)
                                                        @case('Ratings')
                                                            <p>{{ getUserAvgReview($user->id) }}</p>
                                                            @break
                                                        @case('Instagram Followers')
                                                            <p>{{ getUserSocial($user->id,'instagram','followers') }}</p>
                                                            @break
                                                        @case('Facebook Followers')
                                                            <p>{{ getUserSocial($user->id,'facebook','followers') }}</p>
                                                            @break
                                                        @case('Twitter Followers')
                                                            <p>{{ getUserSocial($user->id,'twitter','followers') }}</p>
                                                            @break
                                                        @case('Tiktok Followers')
                                                            <p>{{ getUserSocial($user->id,'tiktok','followers') }}</p>
                                                            @break
                                                        @case('YouTube Subscribers')
                                                            <p>{{ getUserSocial($user->id,'youtube','followers') }}</p>
                                                            @break
                                                        @case('YouTube Channel')
                                                            <p>{{ getUserSocial($user->id,'youtube','username') }}</p>
                                                            @break
                                                        @case('Facebook Handle')
                                                            <p>{{ getUserSocial($user->id,'facebook','username') }}</p>
                                                            @break
                                                        @case('Instagram Handle')
                                                            <p>{{ getUserSocial($user->id,'instagram','username') }}</p>
                                                            @break
                                                        @case('TikTok Handle')
                                                            <p>{{ getUserSocial($user->id,'tiktok','handle') }}</p>
                                                            @break
                                                        @case('Twitter Handle')
                                                            <p>{{ getUserSocial($user->id,'twitter','handle') }}</p>
                                                            @break
                                                        @case('Instagram story price')
                                                            <p>{{ getUserSocialPrice($user->id,'instagram','story','from')." - ".getUserSocialPrice($user->id,'instagram','story','to') }}</p>
                                                            @break
                                                        @case('Instagram post price')
                                                            <p>{{ getUserSocialPrice($user->id,'instagram','post','from')." - ".getUserSocialPrice($user->id,'instagram','post','to') }}</p>
                                                            @break
                                                        @case('Facebook post price')
                                                            <p>{{ getUserSocialPrice($user->id,'facebook','post','from')." - ".getUserSocialPrice($user->id,'facebook','post','to') }}</p>
                                                            @break
                                                        @case('Twitter post price')
                                                            <p>{{ getUserSocialPrice($user->id,'twitter','post','from')." - ".getUserSocialPrice($user->id,'twitter','post','to') }}</p>
                                                            @break
                                                        @case('Tiktok video price')
                                                            <p>{{ getUserSocialPrice($user->id,'tiktok','video','from')." - ".getUserSocialPrice($user->id,'tiktok','video','to') }}</p>
                                                            @break
                                                        @case('YouTube video price')
                                                            <p>{{ getUserSocialPrice($user->id,'youtube','video','from')." - ".getUserSocialPrice($user->id,'youtube','video','to') }}</p>
                                                            @break
                                                        @case('Website blog post price')
                                                            <p>{{ getUserSocialPrice($user->id,'website','blog','from')." - ".getUserSocialPrice($user->id,'website','blog','to') }}</p>
                                                            @break
                                                        @case('Key Words')

                                                            <p>{{ $user->about_me }}</p>

                                                            @break

                                                        @case('Industry')

                                                            <p>{!! getUserIndustry($user->id) !!}</p>

                                                            @break
                                                            
                                                        @default
                                                            <p>-</p>
                                                            @break
                                                    @endswitch
                                                    
                                                </td>
                                                @endforeach
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No Result Found !</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    
</div>
<!-- end:: Content -->
@stop

@section('pagescript')
    <script src="{{ asset('/theme/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>

    <script>
        
        $(document).ready(function() {
            $('#resultTable').DataTable({});
        } );
    </script>
@endsection