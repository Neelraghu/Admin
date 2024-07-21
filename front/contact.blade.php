@extends('front.layouts.default')

@section('title', 'Contacts')

@section('meta_keyword', 'Contacts')

@section('meta_description', 'Contacts')

@section('content')

<style>

    .is_fav{

        color: #ECBFB1;

    }

    .contact_list .user_list.active .is_fav{

        color: white;

    }

</style>

<section>

    <div class="container contacts">

        <br>

        @include('front.includes.message')

        <form>

            <div class="search_top">

                <button><i class="bx bx-search"></i></button>

                <input type="search" class="form-control" placeholder="SEARCH CONTACTS" id="search">

            </div>



            <div class="contact_middle">

                <div class="contact_list mCustomScrollbar">



                </div>

                <div class="info_tab mCustomScrollbar">

                    <div class="ajx_replace">



                    </div>



                </div>

                <div class="info_tab info_tab_copy" style="display: none">

                </div>

            </div>

        </form>

    </div>

</section>



<!-- Modal -->

<div class="modal fade align-middle" id="deleteModalNotes">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title text-center">Delete Note</h3>

                <button class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-center">

                <p><b>Are you sure you want to delete this note ?</b></p>

            </div>

            <div class="modal-footer justify-content-center">

                <div class="bottom_btn">

                    <a href="javascript:" class="btn_sub sm_bt deletenoteid">Delete</a>

                    <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="modal fade align-middle" id="deleteModal">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h3 class="modal-title text-center">Delete Contact</h3>

                <button class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body text-center">

                <p><b>Are you sure you want to delete this contact ?</b></p>

            </div>

            <div class="modal-footer justify-content-center">

                <div class="bottom_btn">

                    <a href="javascript:" class="btn_sub sm_bt deletecontectid">Delete</a>

                    <button class="btn_sub sm_bt btn_boder" type="submit" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

</div>

@stop

@section('pagescript')

<script type="text/javascript">

    $(document).ready(function() {
      $('.info_tab').mCustomScrollbar({
        autoHideScrollbar: true
      });
    });



    $(document).on('click', '.is_fav_change', function () {

        var e = $(this);

        var id = $(this).attr('data-id');

        var url = '{{ route("contacts.is_fav", [":id"]) }}';

        url = url.replace(':id', id);

        $.ajax({

            url: url,

            type: 'GET',

            success: function (result) {

                if (result.status == true) {

                    $(e).children('.icon-heart').toggleClass('is_fav');

                    toastr.success(result.Message);

                    FetchIndex();

                    FetchContact($('.contact_list').children('active').attr('id'));

                } else {

                    toastr.error(result.Message);

                }

            }

        });

    });

    FetchIndex();

    function FetchIndex($search = null) {

        loaderShow();

        var url = '{{ route("contacts") }}';

        $.ajax({

            url: url,

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            'type': 'POST',

            data: {search: $search},

            success: function (result) {

                loaderHide();

                $(document).find('.contact_list').html(result);

                if($search == null){
                    FetchContact($(document).find('.user_list:first').attr('id'));
                }
                //alert(result);

                /*if(result.indexOf('No Record found !') != -1){
                    $(document).find('.info_tab').html("");
                }*/

            }

        });

    }



    //FetchContact();

    function FetchContact(id = null) {


        loaderShow();

        var url = '{{ route("contact.details") }}';

        $.ajax({

            url: url,

            'type': 'POST',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            data: {id: id},

            success: function (result) {

                loaderHide();

                if (result.status == true) {

                    $(document).find('.ajx_replace').html(result.data);
                    $('.info_tab').show();
                    $('.info_tab_copy').hide();
                    $('.back-arrow').on('click', function() {
                      $('.contact_middle').removeClass('contact-open');
                    })

                } else {

                    toastr.error(result.Message);

                }

            }

        });

    }

    $(document).on('click', '.edit_note', function () {

        var id = $(this).data('id');

        $(document).find('#' + id).prop("disabled", false);

        $(this).parent().find('.save_note').show();

        $(this).hide();

    });

    $(document).on('click', '.deletemodel', function () {

        var id = $(this).data('id');

        $(document).find('.deletenoteid').attr('id', id);

        $(document).find('#deleteModalNotes').modal('show');

    });

    $(document).on('click', '.delete_contact', function () {

        var id = $(this).data('id');

        $(document).find('.deletecontectid').attr('id', id);

        $(document).find('#deleteModal').modal('show');

    });

    $(document).on('click', '.deletecontectid', function () {

        var id = $(this).attr('id');

        var e = $(this);

        var url = '{{ route("contact.delete", [":id"]) }}';

        url = url.replace(':id', id);

        $.ajax({

            url: url,

            type: 'DELETE',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            success: function (result) {

                if (result.status == true) {

                    $(document).find('#deleteModal').modal('hide');

                    //$(document).find('.' + result.data).next('.user_list').addClass('active');

                    //$(document).find('.' + result.data).next('.user_list').click();

                    var nextId = $(document).find('.' + result.data).next('.user_list').attr('id');

                    //alert(nextId);

                    $(document).find('.' + result.data).remove();

                    FetchContact(nextId);



                    toastr.success(result.Message);

                } else {

                    toastr.error(result.Message);

                }

            }

        });

    });

    $(document).on('click', '.add_new_notes', function () {

        var contact_id = $(document).find('.user_view_profile .profile').data('contact-id');

        $('.notes-container').append('<div class="notes mt-4" style="margin-bottom:10px;"><div class="d-flex justify-content-between mb-3"><span class="date">Date: <strong>{{\Carbon\Carbon::now()->format("m/d/y")}}</strong></span><div class="edit_dlt"><a href="javascript:" data-id="' + contact_id + '" class="store_note" title="Add Note"><i class="bx bxs-save"></i></a><a href="javascript:" class="deletemodel_new"><i class="bx bxs-trash-alt"></i></a></div></div><textarea class="store_text"></textarea></div>');

    });

    $(document).on('click', '.deletemodel_new', function () {

        $(this).parent().parent().parent().remove();

    });

    $(document).on('click', '.user_list', function () {

        var id = $(this).attr('id');

        $('.user_list').removeClass('active');

        $(this).addClass('active');

        FetchContact(id);

        $('.contact_middle').addClass("contact-open");

    });



    $(document).on('click', '.deletenoteid', function () {

        var id = $(this).attr('id');

        var e = $(this);

        var url = '{{ route("contact.note.delete", [":id"]) }}';

        url = url.replace(':id', id);

        loaderShow();

        $.ajax({

            url: url,

            type: 'DELETE',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            success: function (result) {

                loaderHide();

                if (result.status == true) {

                    $(document).find('#deleteModalNotes').modal('hide');

                    $(document).find('#' + result.data).remove();

                    toastr.success(result.Message);

                } else {

                    toastr.error(result.Message);

                }

            }

        });

    });

    $(document).on('click', '.save_note', function () {

        var id_target = $(this).data('id');

        var Id = $(this).data('bind');

        var url = '{{ route("contact.note.update") }}';

        var note = $(document).find('#' + id_target).val();

        var e = $(this);

        $.ajax({

            url: url,

            'type': 'POST',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            data: {note: note, id: Id},

            success: function (result) {

                if (result.status == true) {

                    $(document).find('#' + id_target).prop("disabled", true);

                    $(e).parent().find('.edit_note').show();

                    $(e).hide();

                } else {

                    toastr.error(result.Message);

                }

            }

        });



    });

    $(document).on('click', '.store_note', function () {

        var contact_id = $(this).data('id');



        var url = '{{ route("contact.note.store") }}';

        var note = $(document).find('.store_text').val();

        if (!note) {

            toastr.error('Note is required. write something to save.');

            return false;

        }

        var e = $(this);

        $.ajax({

            url: url,

            'type': 'POST',

            headers: {

                'X-CSRF-TOKEN': '{{ csrf_token() }}'

            },

            data: {note: note, contact_id: contact_id},

            success: function (result) {

                if (result.status == true) {

                    FetchContact(contact_id);

                    $(e).parent().parent().parent().remove();

                } else {

                    toastr.error(result.Message);

                }

            }

        });



    });



    /*$(document).on('keyup change', '#search', function(event) {

        event.preventDefault();

        FetchIndex($(this).val());

    });*/



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



    $('#search').keyup(delay(function (e) {

        if($(this).val() == ""){
            $('.info_tab').show();
            $('.info_tab_copy').hide();
            FetchIndex();
            FetchContact();
            //FetchContact($('.contact_list').children('active').attr('id'));
        }else{
            $('.info_tab').hide();
            $('.info_tab_copy').show();
            FetchIndex($(this).val());
        }

    }, 700));

    $('#search').keypress(function (e) {
        if (e.which == 13) {
            //alert("yes");
            $('#search').trigger('keyup');
            return false;
        }
    });

</script>

@endsection
