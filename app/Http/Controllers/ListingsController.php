<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $listing
     *
     * @return \Illuminate\Http\Response
     */
    public function store($listing)
    {
        Listing::create([
            'title' => $listing->advert_internet->heading,
            'address' => $listing->address->formats->full_address_w_building_name,
            'price' => $listing->price_advertise_as,
            'description' => $listing->advert_internet->body,
            'images' => serialize($listing->images),
            'listing_state' => $listing->system_listing_state
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param CRMInterface $crm
     *
     * @internal param CRMInterface $crm
     *
     * @internal param CRMInterface $rex
     */
    public function show($id)
    {
        $listing = Listing::find($id);
        return view('listings.show')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
