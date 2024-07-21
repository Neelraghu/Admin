@extends('front.layouts.default')
@section('title', $about->title)
@section('meta_keyword', $about->meta_keyword)
@section('meta_description', $about->meta_description)
@section('content')
<section class="about_site padding-none">
    <div class="container">
        {{-- <div class="text-center"><span class="sm_title">{{ $about->title }}</span></div> --}}
        <h2 style="margin-top: 30px !important;">{{ $about->sub_title }}</h2>
        <p>{{ $about->short_description }}</p>
        {!! $about->description !!}
    </div>
</section>
@stop
@section('pagescript')
<script>
</script>
@endsection