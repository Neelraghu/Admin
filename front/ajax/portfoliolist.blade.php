@if($key)

<li>

    <a data-fancybox="gallery" href="{{ url('sitebucket/portfolio') }}/{{ $key->file }}">

        @if($key->type =="image")

        <img  class="lazy" src="{{ url('sitebucket/portfolio') }}/{{ $key->file }}" alt="portfolio image">

        @else

        <video  class="lazy" style="width: 100%" controls>

            <source src="{{ url('sitebucket/portfolio') }}/{{ $key->file }}" type="video/mp4">

        </video>

        @endif

    </a>

    @if(isset($delete) && $delete['action'] == true)

    <div class="px-2 d-flex justify-content-center">

        <a href="javascript:" data-id="{{ $key->id }}" class="delete_portfolio">delete</a>

    </div>

    @endif

</li>



@endif