@extends('front.layouts.default')
@section('title', $data->title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')
<section class="about_site padding-none">
    <div class="container">
        <div class="text-center"><span class="sm_title">{{ $data->title }}</span></div>
        <h2>{{ $data->sub_title }}</h2>
        <p>{!! $data->description !!}</p>
    </div>
</section>
@stop
@section('pagescript')
<script>
</script>
@endsection
