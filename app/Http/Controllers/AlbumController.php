<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use App\Services\Albums\AlbumsServices;

class AlbumController extends Controller
{
    protected $albumsServices ;
    function __construct( AlbumsServices $albumsServices)  {
        $this->albumsServices = $albumsServices ;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('index',compact('albums')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlbumRequest $request)
    {
       
        $album =Album::create([
            'name'=>$request->name
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $album =  $this->albumsServices->getAlbum($id) ;
        $images = $album->images ;
        return view('images',compact('album','images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlbumRequest $request, $id )
    {
       $album =  $this->albumsServices->getAlbum($id) ;
       $album->update([
        'name'=>$request->name
       ]);
       return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id )
    {
        $album =  $this->albumsServices->getAlbum($id) ;

    }
}
