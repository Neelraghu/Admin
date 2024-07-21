<script>
    $(".reset").click(function () {
       $('.kt-form').find("input[type=text], textarea").val("");
    });

    $('input[name="type"]').click(function(event) {
        if( $(this).val() == "influencer"){
            $('.demographicDiv').show();
        }else{
            $('.demographicDiv').hide();
        }
    });
</script>

{{-- Start Contact Tab Js --}}
<script>
    var contact_table = $('#kt_table_contact').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.contacts.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'type', name: 'type'},
            {data: 'favourite', name: 'favourite'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_contact', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            contact_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });
</script>
{{-- End Contact Tab Js --}}

{{-- Start Social Tab Js --}}
<script>
    $('#social_form').bootstrapValidator({});
    $(document).ready(function() {
        $('#facebook').click(function(event) {
            $('.facebookRow').hide();
            if($(this).prop('checked') == true){
                $('.facebookRow').show();
            }
        });

        $('#instagram').click(function(event) {
            $('.instagramRow').hide();
            if($(this).prop('checked') == true){
                $('.instagramRow').show();
            }
        });

        $('#youtube').click(function(event) {
            $('.youtubeRow').hide();
            if($(this).prop('checked') == true){
                $('.youtubeRow').show();
            }
        });

        $('#twitter').click(function(event) {
            $('.twitterRow').hide();
            if($(this).prop('checked') == true){
                $('.twitterRow').show();
            }
        });

        $('#tiktok').click(function(event) {
            $('.tiktokRow').hide();
            if($(this).prop('checked') == true){
                $('.tiktokRow').show();
            }
        });

        $('#website').click(function(event) {
            $('.websiteRow').hide();
            if($(this).prop('checked') == true){
                $('.websiteRow').show();
            }
        });
        
        @if($editdata->type == "influencer") 
            $('.influencerField').show();
        @else
            $('.influencerField').hide();
        @endif

        $('input[type="number"]').change(function(event) {
            $('#social_form').bootstrapValidator("resetForm",false); 
        });
    });
</script>
{{-- End Social Tab Js --}}

{{-- Start Location Tab Js --}}
<script>
    var location_table = $('#kt_table_location').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.locations.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'location', name: 'location'},
            {data: 'lat', name: 'lat'},
            {data: 'long', name: 'long'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_location', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            location_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });
</script>
{{-- End Location Tab Js --}}

{{-- Start Review Tab Js --}}
<script>
    var review_table = $('#kt_table_review').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.reviews.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'company', name: 'company'},
            {data: 'tagline', name: 'tagline'},
            {data: 'rate', name: 'rate'},
            {data: 'desc', name: 'desc'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],drawCallback:function(){
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        },
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_review', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            review_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.review_status_change', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: id,
            type: 'GET',
            success: function (result) {
                if (result.status == true) {
                    toastr.success(result.Message);
                    review_table.draw(true);
                } else {
                    toastr.error(result.Message);
                }
            }
        });
    });
</script>
{{-- End Review Tab Js --}}

{{-- Start Portfolio Tab Js --}}
<script>
    var portfolio_table = $('#kt_table_portfolio').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.portfolios.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'type', name: 'type'},
            {data: 'file', name: 'file',orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],drawCallback:function(){
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        },
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_portfolio', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            portfolio_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });
</script>
{{-- End Portfolio Tab Js --}}

{{-- Start Search Tab Js --}}
<script>

    function getSearchTable(){

        $("#kt_table_search").DataTable().destroy();
        
        $('#kt_table_search').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                'url': "{{ route('admin.search.getall') }}",
                'type': 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: function (d) {
                    d.user_role = "supplier";
                    d.id = '{{ $editdata->id }}';
                    d.type = $('.search_type').val();
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'type', name: 'type'},
                {data: 'title', name: 'title'},
                {data: 'total', name: 'total'},
                {data: 'status', name: 'status'},
                {data: 'date', name: 'date'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],drawCallback:function(){
                $(function () {
                  $('[data-toggle="tooltip"]').tooltip()
                })
            },
            initComplete: function () {

            }
        });
    }

    $(document).on('click', '.delete_search', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            $("#kt_table_search").DataTable().draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.search_status_change', function () {
        var id = $(this).attr('data-id');
        $.ajax({
            url: id,
            type: 'GET',
            success: function (result) {
                if (result.status == true) {
                    toastr.success(result.Message);
                    $("#kt_table_search").DataTable().draw(true);
                } else {
                    toastr.error(result.Message);
                }
            }
        });
    });

    $(document).on('change', '.search_type', function(event) {
        event.preventDefault();
        //$('#kt_table_search').DataTable().fnDestory();
        getSearchTable();
    });
    getSearchTable();
</script>
{{-- End Search Tab Js --}}

{{-- Start Reminder Tab Js --}}
<script>
    var reminder_table = $('#kt_table_reminder').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.reminder.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'title', name: 'title'},
            {data: 'desc', name: 'desc'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],drawCallback:function(){
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        },
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_reminder', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            reminder_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });
</script>
{{-- End Review Tab Js --}}


{{-- Start Industry Tab Js --}}
<script>
    var reminder_table = $('#kt_table_industry').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            'url': "{{ route('admin.industry.getall') }}",
            'type': 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: function (d) {
                d.user_role = "supplier";
                d.id = '{{ $editdata->id }}';
            }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'category', name: 'category'},
            {data: 'subcategory', name: 'subcategory'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],drawCallback:function(){
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        },
        initComplete: function () {

        }
    });

    $(document).on('click', '.delete_industry', function () {
        var id = $(this).attr('data-id');
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            animation: false,
            customClass: 'animated tada',
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: id,
                    type: 'GET',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (result) {
                        if (result.status == true) {
                            toastr.success(result.Message);
                            reminder_table.draw(true);
                        } else {
                            toastr.error(result.Message);
                        }
                    }
                });
            }
        });
    });
</script>
{{-- End Industry Tab Js --}}