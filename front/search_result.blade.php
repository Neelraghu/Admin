@extends('front.layouts.default')

@section('title', 'Search Result')

@section('meta_keyword', 'Search Result')

@section('meta_description', 'Search Result')

@section('content')



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">



<style>

.help-block{

    color:red;

}

.table-div{
    margin-top: 30px;
    padding:0;
}

.table-result thead tr th{

    font-weight: 350;

}

.table-result tbody tr td:not(:last-child) {

    border-right: 1px solid #dee2e6;

}

.btn_black{
    background-color: #000000 !important;
    border-color:#000000 !important;
}

.btn_grey{
    background-color: #cccccc !important;
    border-color:#cccccc !important;
    cursor: default !important;
}



.list-unstyled.btns{

    margin-left: auto;

    margin-right: 0;

}

</style>
<section class="header-search-results">
    <h1 class="search-results-heading">ADVANCED SEARCH RESULTS</h1>
</section>
<section class="section-searchResults">

<div class="container-search-results">

    <br>

    @include('front.includes.message')

    <div class="row">

        <div class="col-xl-12">

            <div class="search-head">

                <div class="search-note">

                    <li>Search results for @if($search['type'] == "influencer") an Influencer @else a Brand / Business @endif</li>

                    @php

                        $arrLocation = json_decode($search->search_json, true);

                        $miles = array_filter($arrLocation['location']['miles']);

                        $location = array_filter($arrLocation['location']['location']);

                    @endphp


                    @if(!empty($miles) && !empty($location))

                        @foreach ($location as $key => $value)

                            @if(!empty($value) && isset($miles[$key]) && !empty($miles[$key]))

                        {{-- @php

                        dd($value);

                         @endphp --}}

                                <p>Within {{ $miles[$key] }} miles from {{ $value }} </p>

                            @endif

                        @endforeach

                    @endif



                    @foreach($search_json as $key => $value)

                        <li>Searching by

                        {{ $key }}

                            @if($key == "Industry")
                                of {{ getSubCategoryString($value) }}
                            @else
                                @if(is_array($value))

                                    @if(isset($value['from']) && isset($value['to']) && $value['from'] != "" && $value['to'] != "")

                                        from {{ $value['from'] }} to {{ $value['to'] }}.

                                    @endif

                                @else

                                    @if($value != "")

                                        by {{ $value }}.

                                    @endif

                                @endif
                            @endif

                        </li>

                    @endforeach

                </div>

                <ul class="list-unstyled btns">

                    <li>
                        <!-- new search and saved search on same page -->
                        <a href="{{ route('search') }}" class="search-btn-trans search-menu-btns">New Search</a>

                    </li>

                    @if($search->is_delete == '0')

                        <li>

                            <a href="{{ route('search.edit',\Crypt::encrypt($search->id)) }}" class="search-btn-trans search-menu-btns">Modify Search</a>

                        </li>

                    @else

                        <li>

                            <a href="{{ route('search') }}" class="search-btn-trans search-menu-btns">Saved Searches</a>

                        </li>

                    @endif



                    @if($search->is_save == '0')

                        <li>

                            <a href="javascript:" class="search_btn" data-toggle="modal" data-target="#searchModal">Save Search</a>

                        </li>

                    @endif

                </ul>

            </div>
            <div>
                <h2 class="search-res-secondary-heading">Featured Influencers & Brands</h2>
            </div>


            <!--@csrf-->

            <div class="featured-influencers">
                <div class="search-result-container col-6 col-md-3">
                <!-- Placeholder images and ratings for the featured influencers/brands section -->
                    <a href="#">
                        <img class= "search-result-img" src="http://via.placeholder.com/500" alt="">
                        <div class="search-result-info">
                            <div class="search-result-info-container">
                            <p class="search-result-name">John Doe</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-result-container col-6 col-md-3">
                    <a href="#">
                        <img class= "search-result-img" src="http://via.placeholder.com/500" alt="">
                        <div class="search-result-info">
                            <div class="search-result-info-container">
                            <p class="search-result-name">John Doe</p>
                            <span class="icon icon-staar">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-result-container col-6 col-md-3">
                    <a href="#">
                        <img class= "search-result-img" src="http://via.placeholder.com/500" alt="">
                        <div class="search-result-info">
                            <div class="search-result-info-container">
                            <p class="search-result-name">John Doe</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-result-container col-6 col-md-3">
                    <a href="#">
                        <img class= "search-result-img" src="http://via.placeholder.com/500" alt="">
                        <div class="search-result-info">
                            <div class="search-result-info-container">
                            <p class="search-result-name">John Doe</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- filter section -->
            <div class="search-results-section">
                <div class="search-result-filter-container col-12 col-md-3">
                    <button class="filter-btns account-li-btn">Looking For<box-icon name='caret-up' color="#ae7e77" class="carrot"></box-icon></button>
                    <ul class="filter-lists list-account-type">
                        <li class="filter-li"><input type="checkbox">Influencer</input></li>
                        <li class="filter-li"><input type="checkbox">Brand/Business</input></li>
                    </ul>
                    <button class="filter-btns location-li-btn">Location<box-icon name='caret-up' color="#ae7e77" class="carrot"></box-icon></button></button>
                    <ul class="filter-lists list-locations">
                        <li class="filter-li"><input type="checkbox">25 Miles</input></li>
                        <li class="filter-li"><input type="checkbox">50 Miles</input></li>
                        <li class="filter-li"><input type="checkbox">100 Miles</input></li>
                        <li class="filter-li"><input type="checkbox">200+ Miles</input></li>
                    </ul>
                    <button class="filter-btns category-li-btn">Category<box-icon name='caret-down' color="#ae7e77" class="carrot"></box-icon></button></button>
                    <button class="filter-btns price-li-btn">Price Per Post<box-icon name='caret-down' color="#ae7e77" class="carrot"></box-icon></button></button>
                    <button class="filter-btns">Another Filter Here<box-icon name='caret-down' color="#ae7e77" class="carrot"></box-icon></button></button>
                </div>

                <div {{-- class="searchResults-table" --}} class="table-responsive table-div col-12 col-md-9">

                    <table id="resultTable" class="table table-result display {{-- responsive --}} nowrap table-hover">

                        <thead>

                            <tr style="background-color: #333333;color: #fff;text-decoration: underline;font-weight: 350;font-family: 'Gotham';">

                                <th>Name</th>

                                <!--<th>Email</th>

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

                                <th style="text-align:center;">

                                    @if(count($data) != 0 )

                                        <div class="checkbox">

                                            <input type="checkbox" class="all">

                                            <label></label>

                                        </div>

                                    @endif

                                </th>-->

                            </tr>

                        </thead>

                        <tbody>

                            @if(count($data) != 0 )

                                @foreach($data as $user)

                                    @if(!checkUserContact(Auth::id(),$user->id))

                                        <tr align="center">

                                            <td class="search-result-container">

                                                <a href="{{ route('profile.index',\Crypt::encrypt($user->id)) }}" title="view profile" class="user_list">

                                                    @if (!empty($user->image))

                                                    <img class="search-result-img" src="{{ url('sitebucket/users') }}/{{ $user->image }}" alt="{{ $user->first_name . " " . $user->last_name }}">

                                                    @else

                                                    <img class="search-result-img" src="{{ url('front/images/default.png') }}" alt="{{ $user->first_name . " " . $user->last_name }}" />

                                                    @endif

                                                    <div class="search-result-info">
                                                        <div class="search-result-info-container">
                                                            <p class="search-result-name">{{ $user->first_name." ".$user->last_name }}</p>
                                                            {!! getRate(getUserAvgReview($user->id),true,getUserTotalReview($user->id)) !!}
                                                        </div>
                                                    </div>
                                                </a>

                                            </td>

                                            <!--<td>

                                                <p>{{ $user->email }}</p>

                                            </td>

                                            @if(!empty($location))

                                            <td>

                                                @if(!empty($arrLocation = getUserLocation($user->id)))

                                                    <p>{{ implode(' | ', $arrLocation) }}</p>

                                                @endif

                                                {{-- <p>Costa Mesa, CA</p> --}}

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

                            -->

                                            </td>

                                            @endforeach

                                            <!--<td style="text-align:center;">

                                                <div class="checkbox" style="margin-left: 8px">

                                                    <input type="checkbox" value="{{ $user->id }}" name="users[]">

                                                    <label></label>

                                                </div>

                                            </td>-->

                                        </tr>

                                    @endif

                                @endforeach

                            @else

                                {{-- <tr>

                                    <td>No Result Found !</td>

                                </tr> --}}

                            @endif

                        </tbody>

                    </table>

                </div>
            </div>
           <!-- @if(count($data) != 0 )

                <div class="add-btn text-right">

                    <button type="submit" id="add_contact" class="btn_sub sm_bt btn_primary btn_grey" disabled="">Add To Contacts</button>

                </div>

            @endif

            </form>-->

        </div>

    </div>

</div>

</section>



{{-- Save Search Model --}}

<div class="modal fade align-middle" id="searchModal">

<div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

        <div class="modal-header">

            <h3 class="modal-title text-center">Save Search</h3>

            <button class="close" data-dismiss="modal">&times;</button>

        </div>

        <form id="searchForm">

        <div class="modal-body">

            <div class="form-group">

                <input type="hidden" name="id" value="{{ $search->id }}">

                <input type="text" name="title" required="" placeholder="Enter title" class="form-control" data-bv-notempty-message="Please enter title">

            </div>

        </div>

        <div class="modal-footer justify-content-center">

            <div class="bottom_btn">

                <button type="button" class="btn_sub sm_bt" id="search_save">Save</button>

                <button class="btn_sub sm_bt btn_boder" data-dismiss="modal">Cancel</button>

            </div>

        </div>

        </form>

    </div>

</div>

</div>

@stop

@section('pagescript')



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>



<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>



<script>



$(document).ready(function() {

    $('#resultTable').DataTable({

        'order':[],

        'columnDefs': [{

            "targets": [-1],

            "orderable": false

        }],
        "oLanguage": {
            "sEmptyTable": "No result found !"
        },
        "fnDrawCallback": function(oSettings) {
            /*if ($('#resultTable tr').length < 11) {
                $('.dataTables_paginate').hide();
            }*/

            if ($('#resultTable').DataTable().rows().count() < 11) {
                $('.dataTables_paginate').hide();
            }

        },
        "fnInitComplete": function(oSettings) {
        $('#resultTable thead').hide();
        },
        searching:false,
        info:false,
        "pageLength": 9,
        lengthChange:false
    });

    $('a.paginate_button.previous, a.paginate_button.next').html('');

    //alert($('#resultTable').DataTable().rows().count());

} );

//$('.dataTables_empty').html("No result found");
/*$(document).on('change', '.all', function(event) {
    event.preventDefault();
    if($(this).prop('checked') == true){
        $('input[name="users[]"]').prop('checked',true);
        $('#add_contact').show();
        $('#add_contact').removeAttr('disabled');
        $('#add_contact').addClass('btn_black');
        $('#add_contact').removeClass('btn_grey');
    }else{
        $('input[name="users[]"]').prop('checked',false);
        $('#add_contact').show();
        $('#add_contact').attr('disabled',"");
        $("#add_contact").removeClass('btn_black');
        $("#add_contact").addClass('btn_grey');
    }
});

$(document).on('change', 'input[name="users[]"]', function(event) {
    event.preventDefault();
    $total = $('input[name="users[]"]:checked').length;
    if($(this).prop('checked') == false){
        $('.all').prop('checked',false);
    }
    if($('input[name="users[]"]:checked').length == $('input[name="users[]"]').length){
        $('.all').prop('checked',true);
    }
  if($total < 1){
        $('#add_contact').show();
        $('#add_contact').attr('disabled',"");
        $("#add_contact").removeClass('btn_black');
        $("#add_contact").addClass('btn_grey');
    }else{
        $('#add_contact').show();
        $('#add_contact').removeAttr('disabled');
        $('#add_contact').addClass('btn_black');
        $('#add_contact').removeClass('btn_grey');
    }
});*/



$('#searchForm').bootstrapValidator({});



$('#search_save').click(function(event) {

    $title = $('input[name="title"]').val();

    if($title != ""){

        loaderShow();

        $.ajax({

            url: '{{ route('search.store') }}',

            type: 'POST',

            data: {

                    _token: '{{ csrf_token() }}',

                    id:'{{ $search->id}}',

                    @if(isset($last_search_id))

                    last_search_id:'{{ $last_search_id }}',

                    @endif

                    title:$title

                },

        })

        .done(function(result) {

            loaderHide();

            $('#searchModal').modal('hide');

            if (result.status == true) {

                toastr.success(result.Message);

            } else {

                toastr.error(result.Message);

            }

            $('.search_btn').hide();

        })

        .fail(function() {

            loaderHide();

            toastr.error("Something went to wrong !");

            //console.log("error");

        });

    }else{

        toastr.error("Please Enter Title !");

    }



});



$('#searchForm').on('keyup keypress', function(e) {

  if (e.key === 'Enter') {

    e.preventDefault();

    return false;

  }

});


/*$('#addContactForm').submit(function(e){
    e.preventDefault();

    var formData = new FormData(this);

    var url = "{{ route('search.contact.store') }}";

    loaderShow();

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

            if (result == false) {
                toastr.error("Something went to wrong");
                loaderHide();
            } else {
                loaderHide();
                toastr.success('Users add successfully into your contact list.');
                $("#add_contact").hide();
                setTimeout(function() {
                    location.reload();
                }, 5000);
            }

        }

    });

});*/

/* temporary dropdown functionality */
let accBtn = document.querySelector('.account-li-btn');
let accList = document.querySelector('.list-account-type');
let accIcon = document.querySelector('.account-li-btn .carrot');
accBtn.addEventListener('click',()=>{
   if(accList.style.display==="none"){
      accList.style.display="block";
      accIcon.setAttribute('rotate', '');
   }
   else {
      accList.style.display="none";
      accIcon.setAttribute('rotate', '180');
   }
})
</script>

@endsection
