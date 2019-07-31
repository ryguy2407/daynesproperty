<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePage;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

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
        $this->authorize('create', Page::class);
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePage|Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePage $request)
    {
        $slug = '/'.Str::slug($request->get('slug'));
        $page = Page::create($request->all());
        return redirect(route('page.show', $page->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @param null $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, $slug = null)
    {
        //If a slug is provided then retrieve that page and return 404 if it doesn't exist
        if($slug) {
            $page = Page::where( 'slug', $slug )->first();

            if ( ! $page ) {
                abort( 404 );
            }
        }

        return view('pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $this->authorize('update', $page);
        return view('pages.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePage|Request $request
     * @param  \App\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StorePage $request, Page $page)
    {
        $this->authorize('update', $page);

        $slug = '/'.Str::slug($request->get('slug'));

        $page->update([
            'title' => $request->get('title'),
            'slug' => $slug,
            'content' => $request->get('content')
        ]);

        return redirect(route('page.show', $page));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
