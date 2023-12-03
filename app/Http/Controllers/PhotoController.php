<?php
//php artisan make:controller PhotoController --resource
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       return "CALLED INDEX METHOD";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        echo "CALLED CREATE METHOD";
        return view('photos.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        echo "CALLED STORE METHOD";
        //return view('photos.list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
