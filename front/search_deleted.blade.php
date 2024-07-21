@extends('front.layouts.default')
@section('title', 'Deleted Search List')
@section('meta_keyword', 'Deleted Search List')
@section('meta_description', 'Deleted Search List')
@section('content')
<section class="section-searchResults section-save-search">
    <div class="container">
        @include('front.includes.message')
        <div class="row">
            <div class="col-xl-12">
                <div class="search-table">
                    <div class="save-search-head text-center">
                        <h1>Deleted Searches</h1>
                        <div class="search-input">
                            <a href="{{ route('search') }}" class="btn_sub sm_bt btn_boder">Saved Searches</a>
                        </div>
                    </div>
                    <div class="tbody">
                        @if(count($searches) > 0)
                            @foreach($searches as $search)
                            <div class="trow">
                                <span>
                                    {{ $search->title }}
                                </span>
                                <span>{{ $search->total }}</span>
                                <ul class="list-unstyled btns">
                                    <li><a href="{{ route('search.result.id',\Crypt::encrypt($search->id)) }}" class="btn_sub sm_bt">Search</a></li>
                                    {{-- <li><a href="{{ route('search.edit',\Crypt::encrypt($search->id)) }}" class="btn-icon"><span class="icon-edit"></span></a></li> --}}
                                    <li><a href="{{ route('search.restore',\Crypt::encrypt($search->id)) }}" class="btn-icon"><i class="fa fa-undo"></i></a></li>
                                    <li><a href="javascript:" data-id="{{ $search->id }}" data-title="{{ $search->title}}" class="btn-icon deleteSearch"><span class="icon-trash"></span></a></li>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade align-middle" id="deleteModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-center">Delete Seved Search</h3>
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
</div>
@stop
@section('pagescript')
    <script>
        $(document).on('click', '.deleteSearch', function(event) {
           event.preventDefault();
            $id = $(this).attr('data-id');
            $title = $(this).attr('data-title');

            $('#deleteModal').find('.title').text($title);
            $('#deleteModal').find('.deleteSearchId').attr('data-id',$id);
            $('#deleteModal').modal('show');
        });

        $(document).on('click', '.deleteSearchId', function(event) {
            event.preventDefault();
            loaderShow();

            $id = $(this).attr('data-id');
            var url = '{{ route("search.delete", [":id"]) }}';
            url = url.replace(':id', $id);
            
            $.ajax({
                url: url,
            })
            .done(function(result) {
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
            .fail(function() {
                loaderHide();
                toastr.error("Something went to wrong");
            });
            
        });
    </script>
@endsection
