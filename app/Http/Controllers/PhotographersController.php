<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Resources\Photographer as PhotographerResource;
use App\Http\Resources\PhotographerCollection;
use App\Photographer;

class PhotographersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('photographers.index')->with('photographers', Photographer::all());
    }

    public function show($id)
    {
        return view('photographers.show')->with('id', $id);
    }

    public function getPhotographer($id) {
        return response()->json(new PhotographerResource(Photographer::find($id)), 200);
    }
}
