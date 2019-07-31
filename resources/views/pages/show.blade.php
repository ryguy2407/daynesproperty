@extends('layouts.main')

@section('content')

    <div class="listingContent container mx-auto mb-20">
        <div class="bg-white bg-white p-12 mt-10 position-relative">
            @can('update', $page)
                <a class="position-absolute top-0 right-0" href="{{ route('page.edit', $page) }}">Edit this page</a>
            @endcan
            <h1 class="text-2xl mb-4">{{ $page->title }}</h1>
            {!! nl2br(e($page->content)) !!}
        </div>
    </div>

@endsection