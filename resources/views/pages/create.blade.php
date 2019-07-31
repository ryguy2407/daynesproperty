@extends('layouts.main')

@section('content')

    <div class="pager cotnainer mx-auto text-center mb-10"></div>

    <div class="listingContent container mx-auto mb-20">
        <div class="bg-white bg-white p-12 mt-10">
            @include('errors.validation')
            <form action="{{ route('page.store') }}" method="post">
                {{ csrf_field() }}

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Page Title</label>
                    <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">Slug</label>
                    <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="slug" name="slug" type="text">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Page Content</label>
                    <textarea class="appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="content" name="content" rows="10"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="Create Page">
                </div>
            </form>
        </div>
    </div>

@endsection