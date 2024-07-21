@extends('front.layouts.default')

@section('title', 'Search Edit')

@section('meta_keyword', 'Search Edit')

@section('meta_description', 'Search Edit')

@section('content')

<style>

input.form-control.search_textbox {

    margin-bottom: 0;

}

.search_row .location .form-control.sm_input {
    width: 75px;
    padding: 10px;
}

.search_area{

    display: inherit;

}

.search_area span {

    vertical-align: middle;

    margin-top: 15px;

}

.error{

    color: red;

}

</style>

<section class="fill_out">

<div class="container">

    <br>

    @include('front.includes.message')

    <form method="post" action="{{ route('search.result') }}" id="myForm">

        @csrf

        <div class="fill_data">

            <div class="search_middle">

                <div class="row">

                    <div class="col-12">

                        <a class="btn_sub sm_bt btn_primary" href="{{ route('search') }}">Saved Searches</a>

                        <h2><span>Edit Search</span></h2>

                    </div>

                </div>

                <div class="row">

                    <div class="col-12 text-left">

                        <p>Fill out one or more of the categories below to find your perfect soul "collab" mate!</p>

                    </div>



                    <div class="col-12">

                        <div class="search_row">

                            <div class="lable padding-none">

                                <label>Looking for</label>

                            </div>

                            <div class="fild">

                                <div class="checkbox">

                                    <input type="radio" name="type"  value="influencer" @if($search->type=="influencer") checked="" @endif>

                                           <label>an Influencer</label>

                                </div>

                                <div class="checkbox">

                                    <input type="radio" name="type" value="business" @if($search->type=="business") checked="" @endif>

                                           <label >a Brand/Business</label>

                                </div>

                            </div>

                        </div>

                        <div class="search_row">

                            <div class="lable">

                                <label>Location</label>

                            </div>

                            <div class="fild">





                                @php 

                                    $arrLocation = json_decode($search->search_json, true);

                                    $miles = array_filter($arrLocation['location']['miles']);

                                    $location = array_filter($arrLocation['location']['location']);

                                @endphp



                                @if(!empty($miles) && !empty($location))



                                    @foreach ($location as $key => $value) 

                                        @if(!empty($value) && isset($miles[$key]) && !empty($miles[$key]))



                                            <div class="location rows">

                                                <span>within</span>

                                                <input type="number" name="location[miles][]" min=0 class="form-control sm_input search_count" placeholder="" value="{{ $miles[$key] }}" minlength=1 maxlength=3>



                                                <span>miles from</span>

                                                <input type="text" name="location[location][]" class="form-control search_count" placeholder="City, County, or State" value="{{ $value }}">

                                                

                                                @if($key != 0)

                                                <a href="javascript:" class="remove_location ml-2"><img src="{{ url('front') }}/images/minus.png" alt=""></a>

                                                @endif

                                                

                                            </div>



                                        @endif

                                    @endforeach



                                @else

                                    <div class="location">

                                        <span>within</span>

                                        <input type="number" name="location[miles][]" min=0 class="form-control sm_input search_count" placeholder="" minlength=1 maxlength=3>

                                        <span>miles from</span>

                                        <input type="text" name="location[location][]" class="form-control search_count" placeholder="City, County, or State">

                                    </div>

                                @endif



                                <div class="location rows" id="dynamicLocation" style="display: none">

                                    <span>within</span>

                                    <input type="number" name="location[miles][]" min=0 class="form-control sm_input search_count" placeholder="" minlength=1 maxlength=3>

                                    <span>miles from</span>

                                    <input type="text" name="location[location][]" class="form-control search_count" placeholder="City, County, or State">

                                    <a href="javascript:" class="remove_location ml-2"><img src="{{ url('front') }}/images/minus.png" alt=""></a>

                                </div>

                                <div class="add_another">

                                    <a href="javascript:void(0)" class="add_location"><img src="{{ url('front') }}/images/add.png" alt="">Add Another Location</a>

                                </div>

                            </div>

                        </div>

                        <div class="search_row">

                            <div class="lable">

                                <label>Search by</label>

                            </div>

                            <div class="fild">



                                @if(!empty($filter) && isset($filter['text']))

                                    @php $i=0 @endphp

                                    

                                    @foreach($filter['text'] as $key=>$value)

                                    <div class="search_by rows">

                                        <select class="form-control custom-select type_input" @if($key == "Ratings") style="width: 60%;"@endif>

                                            <option value="">--Select Category --</option>

                                            <option @if($key == "Ratings") selected @endif data-input="range">Ratings</option>

                                            <option @if($key == "Instagram Handle") selected @endif data-input="text">Instagram Handle</option>

                                            <option @if($key == "Instagram Followers") selected @endif data-input="number">Instagram Followers</option>

                                            <option @if($key == "Facebook Handle") selected @endif data-input="text">Facebook Handle</option>

                                            <option @if($key == "Facebook Followers") selected @endif data-input="number">Facebook Followers</option>

                                            <option @if($key == "Twitter Handle") selected @endif data-input="text">Twitter Handle</option>

                                            <option @if($key == "Twitter Followers") selected @endif data-input="number">Twitter Followers</option>

                                            <option @if($key == "TikTok Handle") selected @endif data-input="text">TikTok Handle</option>

                                            <option @if($key == "TikTok Followers") selected @endif data-input="number">TikTok Followers</option>

                                            <option @if($key == "YouTube Channel") selected @endif data-input="text">YouTube Channel</option>

                                            <option @if($key == "YouTube Subscribers") selected @endif data-input="number">YouTube Subscribers</option>

                                            <option @if($key == "Key Words") selected @endif data-input="text">Key Words</option>

                                            <option @if($key == "Industry") selected @endif data-input="select">Industry</option>



                                            @if($search->type == "influencer")



                                            {{-- <option @if($key == "Age of Followers") selected @endif data-input="number">Age of Followers</option> --}}

                                            <option @if($key == "Instagram story price") selected @endif data-input="number">Instagram story price</option>

                                            <option @if($key == "Instagram post price") selected @endif data-input="number">Instagram post price</option>

                                            <option @if($key == "Facebook post price") selected @endif data-input="number">Facebook post price</option>

                                            <option @if($key == "Twitter post price") selected @endif data-input="number">Twitter post price</option>

                                            <option @if($key == "Tiktok video price") selected @endif data-input="number">Tiktok video price</option>

                                            <option @if($key == "YouTube video price") selected @endif data-input="number">YouTube video price</option>

                                            <option @if($key == "Website blog post price") selected @endif data-input="number">Website blog post price</option>

                                            @endif

                                        </select>





                                        <div class="input-field search_area">

                                            @if(is_array($value) && isset($value['from']) && isset($value['to']))

                                            <span>from</span>

                                            <input type="number" name="text[{{ $key }}][from]" min=0 class="form-control sm_input search_count" placeholder="" value="{{ $value['from']}}" required="">

                                            <span>to</span>

                                            <input type="number" name="text[{{ $key }}][to]" min=0 class="form-control sm_input search_count" placeholder="" value="{{ $value['to']}}" required="">

                                            @elseif($key == "Ratings")

                                            <input type='number' min=1 max=5 name='text[{{ $key }}]' class='form-control search_textbox search_count star_input' autocomplete='off' value="{{ $value }}" style="width: 70px">

                                            <span class="search_textbox ml-1">

                                                @for($j = 1; $j <= $value ;$j++)

                                                <i class="fas fa-star stars" value="{{ $j }}"></i>

                                                @endfor

                                                @for($j = 1; $j <= 5 - $value; $j++)

                                                <i class="far fa-star stars" value="{{ $j }}"></i>

                                                @endfor

                                            </span>

                                            @elseif($key == "Industry")
                                                
                                               <select class="form-control search_textbox search_count sub_category" multiple="multiple" name="text[{{ $key }}][]">';
                                                    @foreach(getIndustry() as $key)
                                                    <optgroup label="{{ $key->name }}">;
                                                        @foreach($key->sub_category as $sub)
                                                            <option value="{{ $sub->id }}" @if(in_array($sub->id, $value)) selected="" @endif >{{ $sub->name }}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    @endforeach
                                                </select>


                                            @else

                                            <input type='text' name='text[{{ $key }}]' class='form-control search_textbox search_count' value="{{ $value }}" required="">

                                            @endif

                                        </div>

                                        @if($i != 0)

                                        <a href="javascript:" class="remove_search"><img src="{{ url('front') }}/images/minus.png" alt="" title="remove"></a>

                                        @endif

                                        @php $i++; @endphp



                                    </div>

                                    @endforeach

                                @else

                                    <div class="search_by rows" >

                                        <select class="form-control custom-select type_input">

                                            <option value="">--Select Category --</option>

                                            <option data-input="range">Ratings</option>

                                            <option data-input="text">Instagram Handle</option>

                                            <option data-input="number">Instagram Followers</option>

                                            <option data-input="text">Facebook Handle</option>

                                            <option data-input="number">Facebook Followers</option>

                                            <option data-input="text">Twitter Handle</option>

                                            <option data-input="number">Twitter Followers</option>

                                            <option data-input="text">TikTok Handle</option>

                                            <option data-input="number">TikTok Followers</option>

                                            <option data-input="text">YouTube Channel</option>

                                            <option data-input="number">YouTube Subscribers</option>

                                            <option data-input="text">Key Words</option>

                                            <option data-input="select">Industry</option>

                                            @if($search->type == "influencer")

                                            {{-- <option data-input="number">Age of Followers</option> --}}

                                            <option data-input="number">Instagram story price</option>

                                            <option data-input="number">Instagram post price</option>

                                            <option data-input="number">Facebook post price</option>

                                            <option data-input="number">Twitter post price</option>

                                            <option data-input="number">Tiktok video price</option>

                                            <option data-input="number">YouTube video price</option>

                                            <option data-input="number">Website blog post price</option>

                                            @endif

                                        </select>



                                        <div class="input-field search_area">



                                        </div>

                                    </div>

                                @endif

                                <div class="search_by rows" id="dynamicSearch" style="display: none">

                                    <select class="form-control custom-select type_input">

                                        <option value="">--Select Category --</option>

                                        <option data-input="range">Ratings</option>

                                        <option data-input="text">Instagram Handle</option>

                                        <option data-input="number">Instagram Followers</option>

                                        <option data-input="text">Facebook Handle</option>

                                        <option data-input="number">Facebook Followers</option>

                                        <option data-input="text">Twitter Handle</option>

                                        <option data-input="number">Twitter Followers</option>

                                        <option data-input="text">TikTok Handle</option>

                                        <option data-input="number">TikTok Followers</option>

                                        <option data-input="text">YouTube Channel</option>

                                        <option data-input="number">YouTube Subscribers</option>

                                        <option data-input="text">Key Words</option>

                                        <option data-input="select">Industry</option>

                                        @if($search->type == "influencer")


                                        <option data-input="number">Instagram story price</option>

                                        <option data-input="number">Instagram post price</option>

                                        <option data-input="number">Facebook post price</option>

                                        <option data-input="number">Twitter post price</option>

                                        <option data-input="number">Tiktok video price</option>

                                        <option data-input="number">YouTube video price</option>

                                        <option data-input="number">Website blog post price</option>

                                        @endif

                                    </select>



                                    <div class="input-field search_area">



                                    </div>

                                    <a href="javascript:" class="remove_search"><img src="{{ url('front') }}/images/minus.png" alt="" title="remove"></a>

                                </div>

                                <div class="add_another">

                                    <a href="javascript:" class="add_search"><img src="{{ url('front') }}/images/add.png" alt="">Add Another Search Category</a>

                                </div>

                            </div>

                        </div>



                        <input type="hidden" name="id" value="{{ $search->id }}">

                        <div class="search_row">

                            <div class="lable">

                            </div>

                            <div class="fild">

                                <button class="btn_sub" type="submit">Search</button>

                                <span>( <b class="search_count_value">{{ $search->total }}</b> of results)</span>

                            </div>

                        </div>



                    </div>



                </div>

            </div>

        </div>

    </form>

</div>

</section>

@stop

@section('pagescript')



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

$('.sub_category').multiselect({
    enableCollapsibleOptGroups: true,
    includeSelectAllOption: true  ,
    enableClickableOptGroups: true
});


$("#myForm").validate(); 



$business_option = '<option value="">--Select Category --</option>' +

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

$influencer_option = '<option value="">--Select Category --</option>' +

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

        '<option data-input="number">Website blog post price</option>';

$('input[name="type"]').change(function (event) {

    loaderShow();

    if ($(this).val() == "business") {

        $('.custom-select').html($business_option);

    } else {

        $('.custom-select').html($influencer_option);

    }

    $('.input-field').html('');

    getSearchCount();

    loaderHide();

});

$(document).on('change', '.custom-select', function () {

    var value = $(this).val();

    var $this = $(this);

    $(".custom-select").each(function () {

        if (this.value == value) {

            this.value = '';

            $(this).closest('.search_by').find('.input-field').html('');

        }

    });

    $this.val(value);

    if (value != "") {

        $input_type = $this.children('option:selected').attr('data-input');

        if ( $input_type == "text") {

            $input = "<input type='text' name='text[" + value + "]' class='form-control search_textbox search_count' required>";

        } else if($input_type == "range"){

            $(this).css('width', '60%');



            $input = "<input type='number' min=1 max=5 name='text[" + value + "]' class='form-control search_textbox search_count star_input' autocomplete='off' style='width: 70px'>";



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

            $input = '<select class="form-control search_textbox search_count sub_category" multiple="multiple" name="text[' + value + '][]">';
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

                    '<input type="number" name="text[' + value + '][from]" min=0 class="form-control sm_input search_count" placeholder="" required>' +

                    '<span>to</span>' +

                    '<input type="number" name="text[' + value + '][to]" min=0 class="form-control sm_input search_count" placeholder="" required>';

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


    var text = $('input[name^="text"]');

    

    $('input[name^="text"]').each(function() {



        $(this).rules("add", {

            required: true,

            messages: {

                required: "<br>"+"This is Mandatory"

            }

        });

    });

    $('select[name^="text"]').rules("add", {
        required: true,

        messages: {

            required: "<br>"+"This is Mandatory"

        }
    });

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

            //.attr('class','rows')

            .removeAttr('id')

            .removeAttr('style')

            .insertBefore($template);

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

            //.attr('class','rows')

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



/*$(document).on('keyup change', 'form :input', function (event) {

    event.preventDefault();

    getSearchCount();

});*/



/*$('form').on('keyup change paste', 'input, select', function(){

    getSearchCount();

});*/



$(document).on('change paste', '.search_count', function (event) {

    event.preventDefault();

    getSearchCount();

});



function getSearchCount(){

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

@endsection

