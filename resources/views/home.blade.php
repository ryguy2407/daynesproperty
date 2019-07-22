@extends('layouts.main')

@section('content')

    <div class="feature">
        <div class="container mx-auto py-5">
            <div class='embed-container'><iframe src='https://www.youtube.com/embed//q2qbmFJFzV0' frameborder='0' allowfullscreen></iframe></div>
        </div>
    </div><!-- end feature -->

    <div class="searchForm container mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-6 flex">

            <div class="inline-block relative w-64 flex-1 mr-4">
                <select class="appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option>Please select</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div><!-- end select -->

            <div class="inline-block relative w-64 flex-1 mr-4">
                <select class="appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                    <option>Please select</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div><!-- end select -->

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded focus:outline-none focus:shadow-outline flex-1" type="button">
                Search
            </button>
        </form>
    </div><!-- end search -->

    <div class="listings container mx-auto">
        <div class="flex -mx-6 flex-wrap">

            @foreach($listings as $listing)
                <div class="w-1/3 px-4 listing">
                    <div class="blue">
                        <a href="/listing/{{ $listing->id }}">
                            <img class="object-cover h-48 w-full" src="{{ $listing->images[0]->url }}" alt="">
                        </a>
                        <h2 class="p-4 text-white text-lg">{{ $listing->title }}</h2>
                    </div>
                    <div class="border border-top-0 border-gray-400 bg-white">
                        <ul class="flex flex-wrap p-4 text-gray-600">
                            <li class="w-1/2 mb-2">465 m2</li>
                            <li class="w-1/2 mb-2">4 Bedrooms</li>
                            <li class="w-1/2">2 Bathrooms</li>
                        </ul>
                        <hr class="my-0">
                        <h2 class="p-4 text-gray-600 text-lg">{{ $listing->price }}</h2>
                    </div>
                </div><!-- end listing -->
            @endforeach

        </div>
    </div><!-- end listings -->

@endsection