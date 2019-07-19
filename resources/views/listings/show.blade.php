@extends('layouts.main')

@section('content')

    <div class="heroSlideshow container mx-auto mt-12 mb-10">
        <img src="/images/listings/test-hero.jpeg" class="object-cover w-full" alt="" style="height: 600px;">
    </div>

    <div class="listingContent container mx-auto mb-20">
        <ul class="flex flex-wrap features">
            <li class="w-1/4">456 m2</li>
            <li class="w-1/4">4 Bedrooms</li>
            <li class="w-1/4">2 Bathrooms</li>
            <li class="w-1/4">2 Garages</li>
        </ul>
        <div class="bg-white bg-white p-12 mt-10">
            <h1 class="text-2xl mb-4">12 Gippsland Place, Calamvale</h1>
            <p class="text-base">
                This welcoming and gracious family home promises the new lucky
                owners the very best in convenience and lifestyle. Sweeping
                lawns front the property which has been finished with a
                neutral render and stylishly complemented by treated timber
                accents, all giving this property great street appeal. What
                cannot be seen from the outside, however, are the generously
                proportioned internal paces with lofty ceilings and beautiful
                finishes.
            </p>
            <ul class="text-base list-disc list-inside">
                <li>List item one</li>
                <li>List item one</li>
                <li>List item one</li>
            </ul>

            <h1 class="text-2xl mb-4 bg-white mt-8">Location</h1>
            <hr>
            <p id="address">12 Gippsland Place, Calamvale</p>
            <div id="map" class="mb-10"></div>

            <h1 class="text-2xl mb-4 bg-white mt-8">Agent</h1>
            <hr>
            <div class="border border-gray-600 p-12 mt-10 flex text-gray-600">
                <div class="w-1/3 px-4 -ml-4">
                    <img src="/images/adrian.jpg" alt="Adrian Daynes">
                </div>
                <div class="w-2/3 px-4 mr-4">
                    <h2 class="text-2xl mb-4">Adrian Daynes</h2>
                    <ul>
                        <li>adrian@daynesproperty.com.au</li>
                        <li>07 3488 8190</li>
                        <li>0411 729 484</li>
                    </ul>
                    <p>
                        A fixture of the Acacia Ridge community, Adrian is known
                        for his easy smile, quick laugh and down-to-earth
                        approach to business. As a director of Daynes Property,
                        he brings together his wealth of knowledge and expert
                        negotiation skills to ensure.</p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Go to Adrian's profile
                    </button>
                </div>
            </div>

        </div>
    </div>
    <script>
        // Initialize and add the map
        function initMap() {
            // The map, centered at Uluru
            var map = new google.maps.Map(
                    document.getElementById('map'), {zoom: 16});

            var geocoder = new google.maps.Geocoder();

            //Geocode the address
            geocodeAddress(geocoder, map);

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').textContent;
                geocoder.geocode({'address': address}, function(results, status) {
                    if (status === 'OK') {
                        resultsMap.setCenter(results[0].geometry.location);
                        new google.maps.Marker({
                            map: resultsMap,
                            icon: {url: '/images/icon-home-1.png', scaledSize: new google.maps.Size(50, 68)},
                            position: results[0].geometry.location
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiL9Be-DA2Wz8kTNAgHOEbdd-GS_UYN4Y&callback=initMap">
    </script>

@endsection