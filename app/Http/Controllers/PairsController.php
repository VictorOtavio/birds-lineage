<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Http\Requests\PairRequest;
use Illuminate\Contracts\Support\Renderable;

class PairsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $pairs = Pair::with(['male', 'female', 'cage'])
            ->get()
            ->map(fn ($p) => $this->pairPresenter($p));

        return view('breeding.pairs.index', compact('pairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('breeding.pairs.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PairRequest  $request
     * @return Renderable
     */
    public function store(PairRequest $request)
    {
        Pair::create([
            'male_id'   => $request->input('male'),
            'female_id' => $request->input('female'),
            'cage_id'   => $request->input('cage'),
        ]);

        return redirect()->route('breeding:pairs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Pair  $pair
     * @return Renderable
     */
    public function show(Pair $pair)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Pair  $pair
     * @return Renderable
     */
    public function edit(Pair $pair): Renderable
    {
        $pair = $this->pairPresenter($pair);

        return view('breeding.pairs.form', compact('pair'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PairRequest  $request
     * @param  Pair  $pair
     * @return Renderable
     */
    public function update(PairRequest $request, Pair $pair)
    {
        $pair->male_id = $request->input('male');
        $pair->female_id = $request->input('female');
        $pair->cage_id = $request->input('cage');
        $pair->save();

        return redirect()->route('breeding:pairs.form');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Pair  $pair
     * @return Renderable
     */
    public function destroy(Pair $pair)
    {
        $pair->delete();

        return response(null, 204);
    }

    /**
     * Prepara os dados para apresentação
     *
     * @param  Pair  $pair
     * @return array
     */
    private function pairPresenter(Pair $pair): array
    {
        $attributes = $pair->getAttributes();

        $attributes['male'] = $pair->male !== null ? $pair->male->identifier : null;
        $attributes['female'] = $pair->female !== null ? $pair->female->identifier : null;
        $attributes['cage'] = $pair->cage->number;

        return $attributes;
    }
}
