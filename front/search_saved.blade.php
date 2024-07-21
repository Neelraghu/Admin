@extends('front.layouts.default')
@section('title', 'Search List')
@section('meta_keyword', 'Search List')
@section('meta_description', 'Search List')
@section('content')
<!-- new search section -->
<section class="header-search-results">
    <h1 class="search-results-heading">ADVANCED SEARCH</h1>
</section>
<section class="fill_out">

<div class="container advanced-search-page">
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <p class="post-header-text">Fill out one or more of the categories below to find your perfect soul "collab" mate!</p>
        </div>
    </div>
    @include('front.includes.message')

    <form method="post" action="{{ route('search.result') }}" id="myForm">

        @csrf

        <div class="search-form-container">
            <div class="search_middle">
                <div class="row">
                    <div class="col-12">

                        <div class="search_row">

                            <div class="lable padding-none">

                                <label>Looking for</label>

                            </div>

                            <div class="fild">

                                <div class="checkbox-search">

                                    <input type="radio" name="type" value="influencer">

                                    <label>An Influencer</label>

                                </div>

                                <div class="checkbox-search">

                                    <input type="radio" name="type" value="business">

                                    <label >A Brand/Business</label>

                                </div>

                            </div>

                        </div>

                        <div class="search_row">

                            <div class="lable">

                                <label>Location</label>

                            </div>

                            <div class="fild">

                                <div class="location">

                                    <div class="form-group mb-0">

                                        <div class="d-flex align-items-end">

                                            <span>Within</span>

                                                <input type="number" name="location[miles][]" min=0 class="search-form-control sm_input search_count" placeholder="" minlength=1 maxlength=3>

                                        </div>

                                    </div>
                                    <div class="counter-btns-outer">
                                        <button onclick="" class="counter-btns"><i class='bx bxs-up-arrow' ></i></button>
                                        <button onclick="" class="counter-btns"><i class='bx bxs-down-arrow' ></i></button>
                                    </div>
                                    <div class="form-group mb-0">

                                        <div class="d-flex miles-wrap align-items-end">

                                            <span>miles from</span>

                                            <input type="text" name="location[location][]" class="search-form-control search_count" placeholder="City, State, or County">

                                        </div>

                                    </div>

                                </div>

                                <div class="location rows" id="dynamicLocation" style="display: none">

                                    <div class="form-group mb-0">

                                        <div class="d-flex align-items-center">

                                            <span>within</span>

                                            <input type="number" name="location[miles][]" min=0 class="search-form-control sm_input search_count" placeholder="" required="" minlength=1 maxlength=3>

                                        </div>

                                    </div>

                                    <div class="form-group mb-0">

                                        <div class="d-flex flex-wrap align-items-center">

                                            <span>miles from</span>

                                            <input type="text" name="location[location][]" class="search-form-control search_count" placeholder="City, County, or State" required="">

                                            <a href="javascript:" class="remove_location ml-2"><img src="{{ url('front') }}/images/minus.png" alt=""></a>

                                        </div>

                                    </div>

                                </div>

                                <div class="add_another">

                                    <a href="javascript:void(0)" class="add_location"><i class='bx bxs-plus-circle' ></i> Add Another Location</a>

                                </div>

                            </div>

                        </div>

                        <div class="search_row">

                            <div class="lable">

                                <label>Search by</label>

                            </div>

                            <div class="fild">

                                <div class="search_by" id="staticSearch">

                                    <select class="search-form-control dropdown-search type_input">

                                    </select>

                                    <div class="input-field search_area align-items-end">

                                    </div>

                                </div>

                                <div class="search_by rows" id="dynamicSearch" style="display: none">

                                    <select class="search-form-control dropdown-search type_input">

                                    </select>

                                    <div class="input-field search_area align-items-end">

                                    </div>

                                    <a href="javascript:" class="remove_search"><img src="{{ url('front') }}/images/minus.png" alt="" title="remove"></a>

                                </div>

                                <div class="add_another">

                                    <a href="javascript:" class="add_search"><i class='bx bxs-plus-circle' ></i> Add Another Search Category</a>

                                </div>

                            </div>

                        </div>

                        <div class="search_row">

                            <div class="lable">

                            </div>

                            <div class="text-center">

                                <button class="btn_sub" type="submit">Search</button>

                                <div class="result-count"><span class="search_count_value">#</span> Results</div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

</section>

<!-- saved search section -->
<section class="section-searchResults section-save-search">
    <div class="save-search-head text-center">
        <h2 class="header">Saved Searches</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="search-table">
                    <div class="tbody">
                        @if(count($searches) > 0)
                        @foreach($searches as $search)
                        <div class="trow">
                            <span>
                                {{ $search->title }}
                            </span>
                            <ul class="list-unstyled btns">
                                <li><a href="{{ route('search.result.id',\Crypt::encrypt($search->id)) }}" class="search-btn">Search</a></li>
                                <li><a href="{{ route('search.edit',\Crypt::encrypt($search->id)) }}" class="light-icon"><i class='bx bxs-edit-alt'></i></a></li>
                                <li><a href="javascript:" data-id="{{ $search->id }}" data-title="{{ $search->title}}" class="light-icon deleteSearch"><i class='bx bxs-trash-alt' ></i></a></li>
                            </ul>
                        </div>
                        @endforeach
                        @else
                        <div class="trow">
                            <span>
                                No result found !
                            </span>
                        </div>
                        @endif
                        <!-- @if($deleted_search != 0)
                        <div class="search-delate">
                            <a href="{{ route('search.delete.list') }}"><span class="icon-trash"></span>Deleted Searches</a>
                        </div>
                        @endif-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<!--<div class="modal fade align-middle" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Delete Saved Search</h3>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <p><b>Are you sure you want to delete this saved search?</b></p>
                <p class="title"></p>
            </div>
            <div class="modal-footer justify-content-center">
                <div class="bottom_btn">
                    <a class="btn_sub sm_bt deleteSearchId text-white">Delete Search</a>
                    <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
@stop
@section('pagescript')
<!-- scripts for the new search section -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>



<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&libraries=places"></script>



<script>



initMap();

function initMap(){



    $($('input[name="location[location][]"]')).each(function(index, el) {

        var autocomplete = new google.maps.places.Autocomplete($(this)[0], {});



        google.maps.event.addListener(autocomplete, 'place_changed', function() {

            var place = autocomplete.getPlace();

            console.log(place.address_components);

        });

    });

}



$('#myForm').on('keyup keypress', function(e) {

  var keyCode = e.keyCode || e.which;

  if (keyCode === 13) {

    e.preventDefault();

    return false;

  }

});



$("#myForm").validate();

$business_option = '<option value="">Select Category</option>' +

        '<option data-input="range">Ratings</option>' +

        '<option data-input="text">Instagram Handle</option>' +

        '<option data-input="number">Instagram Followers</option>' +

        '<option data-input="text">Facebook Handle</option>' +

        '<option data-input="number">Facebook Followers</option>' +

        '<option data-input="text">Twitter Handle</option>' +

        '<option data-input="number">Twitter Followers</option>' +

        '<option data-input="text">TikTok Handle</option>' +

        '<option data-input="number">TikTok Followers</option>' +

        '<option data-input="text">YouTube Channel</option>' +

        '<option data-input="number">YouTube Subscribers</option>'+

        '<option data-input="text">Key Words</option>'+

        '<option data-input="select">Industry</option>';

$influencer_option = '<option value="">Select Category</option>' +

        '<option data-input="range">Ratings</option>' +

        '<option data-input="text">Instagram Handle</option>' +

        '<option data-input="number">Instagram Followers</option>' +

        '<option data-input="text">Facebook Handle</option>' +

        '<option data-input="number">Facebook Followers</option>' +

        '<option data-input="text">Twitter Handle</option>' +

        '<option data-input="number">Twitter Followers</option>' +

        '<option data-input="text">TikTok Handle</option>' +

        '<option data-input="number">TikTok Followers</option>' +

        '<option data-input="text">YouTube Channel</option>' +

        '<option data-input="number">YouTube Subscribers</option>' +

       '<option data-input="text">Key Words</option>' +

       '<option data-input="select">Industry</option>' +

        '<option data-input="number">Instagram story price</option>' +

        '<option data-input="number">Instagram post price</option>' +

        '<option data-input="number">Facebook post price</option>' +

        '<option data-input="number">Twitter post price</option>' +

        '<option data-input="number">Tiktok video price</option>' +

        '<option data-input="number">YouTube video price</option>' +

        '<option data-input="number">Website blog post price</option>' +

        $('.dropdown-search').html($business_option);



$('input[name="type"]').change(function (event) {

    loaderShow();

    if ($(this).val() == "business") {

        $('.dropdown-search').html($business_option);

    } else {

        $('.dropdown-search').html($influencer_option);

    }

    $('.input-field').html('');

    $('.search_count_value').text("#");

    getSearchCount();

    loaderHide();

});

$(document).on('change', '.dropdown-search', function () {

    var value = $(this).val();

    var $this = $(this);

    $(".dropdown-search").each(function () {

        if (this.value == value) {

            this.value = '';

            $(this).closest('.search_by').find('.input-field').html('');

        }

    });

    $this.val(value);

    if (value != "") {

        $input_type = $this.children('option:selected').attr('data-input');

        if ( $input_type == "text") {

            $input = "<input type='text' name='text[" + value + "]' class='search-form-control search_textbox search_count'>";

        } else if($input_type == "range"){

            $(this).css('width', '60%');

            $input = "<input type='number' min=1 max=5 name='text[" + value + "]' class='search-form-control search_textbox search_count star_input' autocomplete='off' style='width: 70px'>";

            $input += '<div class="counter-btns-outer"><button onclick="" class="counter-btns"><i class="bx bxs-up-arrow"></i></button><button onclick="" class="counter-btns"><i class="bx bxs-down-arrow"></i></button></div>';

            $input += '<span class="search_textbox ml-1">'+

                        '<i class="far fa-star stars" value="1"></i>'+

                        '<i class="far fa-star stars" value="2"></i>'+

                        '<i class="far fa-star stars" value="3"></i>'+

                        '<i class="far fa-star stars" value="4"></i>'+

                        '<i class="far fa-star stars" value="5"></i>'+

                        '</span>';

                //$input +='<span class="stars sm_input" data-rating="0" data-num-stars="5" ></span>';

        }else if ( $input_type == "select") {

            $(this).css('width', '60%');

            $input = '<select class="search-form-control search_textbox search_count sub_category" multiple="multiple" name="text[' + value + '][]">';
                @foreach(getIndustry() as $key)
            $input += '<optgroup label="{{ $key->name }}">';
                    @foreach($key->sub_category as $sub)
                        $input += '<option value="{{ $sub->id }}">{{ $sub->name }}</option>';
                    @endforeach
            $input += '</optgroup>';
                @endforeach
            $input += '</select>';

        }else {

            $input = '<span>from</span>' +

                    '<input type="number" name="text[' + value + '][from]" min=0 class="search-form-control sm_input search_count" placeholder="" autocomplete="off" >' +
                    '<div class="counter-btns-outer"><button onclick="" class="counter-btns"><i class="bx bxs-up-arrow"></i></button><button onclick="" class="counter-btns"><i class="bx bxs-down-arrow"></i></button></div>'+
                    '<span>to</span>' +
                    '<input type="number" name="text[' + value + '][to]" min=0 class="search-form-control sm_input search_count" placeholder="" autocomplete="off">' +
                    '<div class="counter-btns-outer"><button onclick="" class="counter-btns"><i class="bx bxs-up-arrow"></i></button><button onclick="" class="counter-btns"><i class="bx bxs-down-arrow"></i></button></div>';

                    //$('input[name="text[' + value + '][from]"]').val()

        }

    } else {

        $input = " ";
        getSearchCount();

    }

    $this.closest('.search_by').find('.input-field').html($input);


    $('.sub_category').multiselect({
        enableCollapsibleOptGroups: true,
        includeSelectAllOption: true  ,
        enableClickableOptGroups: true
    });

    /*$('.sub_category').multiselect('rebuild');
    $('.sub_category').multiselect('refresh');*/

    var text = $('input[name^="text"]');



    /*text.filter('input[name$="[from]"]').each(function() {

        $(this).rules("add", {

            required: true,

            messages: {

                required: "<br>"+"From is Mandatory"

            }

        });

    });



    text.filter('input[name$="[to]"]').each(function() {

        $(this).rules("add", {

            required: true,

            messages: {

                required: "<br>"+"To is Mandatory"

            }

        });

    });*/



    $('input[name^="text"]').each(function() {



        $(this).rules("add", {

            required: true,

            messages: {

                required: "This is Mandatory"

            }

        });

    });

    $('select[name^="text"]').rules("add", {
        required: true,

        messages: {

            required: "This is Mandatory"

        }
    });


    //$('#myForm').validate();



});



$(".add_location").click(function () {

    $lvalue = $("input[name='location[location][]']").eq(-2).val();
    $mvalue = $("input[name='location[miles][]']").eq(-2).val();
    if($lvalue == "" || $mvalue == ""){
        toastr.error("please fill out previous location details !");
        return false;
    }
    var $template = $('#dynamicLocation'),

            $clone = $template

            .clone()

            //.addClass('class',')

            .removeAttr('id')

            .removeAttr('style')

            .insertBefore($template);



    $('input[name^="location"]').each(function() {



        $(this).rules("add", {

            required: true,

            messages: {

                required: "This is Mandatory"

            }

        });

    });

    initMap();

});

$(document).on('click', '.remove_location', function (event) {

    event.preventDefault();

    if (confirm("Are you sure want remove ?")) {



        $clone = $(this).closest('.rows');

        $clone.remove();



        initMap();

    }

});



$(".add_search").click(function () {

    var $template = $('#dynamicSearch'),

            $clone = $template

            .clone()

            //.attr('class',')

            .removeAttr('id')

            .removeAttr('style')

            .insertBefore($template);

});

$(document).on('click', '.remove_search', function (event) {

    event.preventDefault();

    if (confirm("Are you sure want remove ?")) {



        $clone = $(this).closest('.rows');

        $clone.remove();

        getSearchCount();

    }

});



function delay(callback, ms) {

  var timer = 0;

  return function() {

    var context = this, args = arguments;

    clearTimeout(timer);

    timer = setTimeout(function () {

      callback.apply(context, args);

    }, ms || 0);

  };

}


/*$('form').on('keyup change paste', 'input, select', function(){

    getSearchCount();

});*/



$(document).on('change paste', '.search_count', function (event) {

    event.preventDefault();

    getSearchCount();

});


function getSearchCount(){

    var type = $("input[name='type']:checked").val();

    /*if(type != undefined){*/

        var formData = $('#myForm').serialize();

        var url = "{{ route('search.count') }}";

        $.ajax({

            url: url,

            type: 'POST',

            data:{formData},

            /*cache:false,

            contentType: false,

            processData: false,*/

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            success: function (data) {

                if(data.status == false){

                    toastr.error(data.message);

                }

                $count = data.count;

                if(data.count >= 25){

                    $count = "25+";

                }

                $('.search_count_value').text(data.count);

            }

        });

    /*}else{

    }*/


}


$(document).on('keyup change', '.star_input', function(event) {

    event.preventDefault();

    $('.stars').each(function(index, el) {

        if(index < $('.star_input').val()){

            $(this).removeClass('far');

            $(this).addClass('fas');

        }else{

            $(this).removeClass('fas');

            $(this).addClass('far');

        }

    });

    getSearchCount();

});


$(document).on('click', '.stars', function(event) {

    event.preventDefault();

    $('.star_input').val($(this).attr('value'));



    $('.stars').each(function(index, el) {

        if(index < $('.star_input').val()){

            $(this).removeClass('far');

            $(this).addClass('fas');

        }else{

            $(this).removeClass('fas');

            $(this).addClass('far');

        }

    });

    getSearchCount();

});

</script>

<!-- scripts for the saved search section -->
<script>
    $(document).on('click', '.deleteSearch', function (event) {
        event.preventDefault();
        $id = $(this).attr('data-id');
        $title = $(this).attr('data-title');

        $('#deleteModal').find('.title').text($title);
        $('#deleteModal').find('.deleteSearchId').attr('data-id', $id);
        $('#deleteModal').modal('show');
    });

    $(document).on('click', '.deleteSearchId', function (event) {
        event.preventDefault();
        loaderShow();

        $id = $(this).attr('data-id');
        var url = '{{ route("search.delete.status", [":id"]) }}';
        url = url.replace(':id', $id);

        $.ajax({
            url: url,
        })
                .done(function (result) {
                    loaderHide();
                    if (result.status == true) {
                        $('#deleteModal').modal('hide');
                        toastr.success(result.Message);

                        setTimeout(function () {
                            location.reload(true);
                        }, 4000);

                    } else {
                        toastr.error(result.Message);
                    }

                })
                .fail(function () {
                    loaderHide();
                    toastr.error("Something went to wrong");
                });

    });
</script>
@endsection
