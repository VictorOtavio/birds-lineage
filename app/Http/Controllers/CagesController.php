<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use Illuminate\Http\Request;
use App\Http\Requests\CageStoreRequest;

class CagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cages = Cage::all();

        return view('repertories.cages.index', compact('cages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('repertories.cages.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CageStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CageStoreRequest $request)
    {
        Cage::create($request->input());

        return redirect()->route('repertories:cages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function show(Cage $cage)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function edit(Cage $cage)
    {
        return view('repertories.cages.form', compact('cage'));
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
     * @param  Cage  $cage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return response(null, 204);
    }
}
