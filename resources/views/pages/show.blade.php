@extends('layouts.main')

@section('content')

    <div class="listingContent container mx-auto mb-20">
        <div class="bg-white bg-white p-12 mt-10 position-relative">
            <div class="flex justify-between">
                <h1 class="text-2xl mb-4">{{ $page->title }}</h1>
                @can('update', $page)
                <a class="self-start leading-none bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('page.edit', $page) }}">
                    Edit this page
                </a>
                @endcan
            </div>
            {!! nl2br(e($page->content)) !!}
        </div>
    </div>

@endsection