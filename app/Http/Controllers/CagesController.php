<?php

namespace App\Http\Controllers;

use App\Models\Cage;
use App\Http\Requests\CageRequest;
use Illuminate\Contracts\Support\Renderable;

class CagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $cages = Cage::all();

        return view('repertories.cages.index', compact('cages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('repertories.cages.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CageRequest  $request
     * @return Renderable
     */
    public function store(CageRequest $request)
    {
        Cage::create(['number' => $request->input('number')]);

        return redirect()->route('repertories:cages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Cage  $cage
     * @return Renderable
     */
    public function show(Cage $cage)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cage  $cage
     * @return Renderable
     */
    public function edit(Cage $cage): Renderable
    {
        return view('repertories.cages.form', compact('cage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CageRequest  $request
     * @param  Cage  $cage
     * @return Renderable
     */
    public function update(CageRequest $request, Cage $cage)
    {
        $cage->number = $request->input('number');
        $cage->save();

        return redirect()->route('repertories:cages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cage  $cage
     * @return Renderable
     */
    public function destroy(Cage $cage)
    {
        $cage->delete();

        return response(null, 204);
    }
}
