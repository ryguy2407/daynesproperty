@extends('layouts.main')

@section('content')

    <div class="pager cotnainer mx-auto text-center mb-10"></div>

    <div class="listingContent container mx-auto mb-20">
        <div class="bg-white bg-white p-12 mt-10">
            <h1 class="text-2xl mb-4">{{ $page->title }}</h1>
            {!! nl2br(e($page->content)) !!}
        </div>
    </div>

@endsection