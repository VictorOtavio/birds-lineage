<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use App\Models\Cage;
use App\Models\Species;
use App\Enums\BirdSexType;
use Illuminate\Http\Request;
use App\Enums\BirdStatusType;
use App\Http\Requests\BirdRequest;
use Illuminate\Contracts\Support\Renderable;

class BirdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $birds = Bird::with(['species', 'cage', 'father', 'mother'])
            ->where('status', BirdStatusType::Available)
            ->orderBy('hatch_date')
            ->get()
            ->map(fn ($b) => $this->birdPresenter($b));

        return view('birds.index', compact('birds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        $selects = [];
        $selects['species'] = Species::all()->map(fn ($s) => [
            'id' => $s->id,
            'popular_name' => $s->popular_name,
        ]);
        $selects['cages'] = Cage::all()->map(fn ($c) => [
            'id' => $c->id,
            'number' => $c->number,
        ]);
        $selects['male_birds'] = Bird::where('status', 'available')
            ->where('sex', 'male')
            ->get()
            ->map(fn ($b) => [
                'id' => $b->id,
                'identifier' => $b->identifier,
            ]);
        $selects['female_birds'] = Bird::where('status', 'available')
            ->where('sex', 'female')
            ->get()
            ->map(fn ($b) => [
                'id' => $b->id,
                'identifier' => $b->identifier,
            ]);

        return view('birds.form', compact('selects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BirdRequest  $request
     * @return Renderable
     */
    public function store(BirdRequest $request)
    {
        Bird::create([
            'identifier' => $request->input('identifier'),
            'status'     => $request->input('status'),
            'sub_status' => $request->input('sub_status'),
            'species_id' => $request->input('species'),
            'sex'        => $request->input('sex'),
            'origin'     => $request->input('origin'),
            'band'       => $request->input('band'),
            'hatch_date' => $request->input('hatch_date'),
            'cage_id'    => $request->input('cage'),
            'father_id'  => $request->input('father'),
            'mother_id'  => $request->input('mother'),
            'end_date'   => $request->input('end_date'),
        ]);

        return redirect()
            ->route('birds:index')
            ->withSuccess(__('Bird successfully registered'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function show(Bird $bird)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function edit(Bird $bird)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bird $bird)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bird $bird)
    {
        //
    }

    /**
     * Prepara os dados para apresentação
     *
     * @param  Bird  $bird
     * @return array
     */
    private function birdPresenter(Bird $bird): array
    {
        $attributes = [];

        $attributes['id'] = $bird->id;
        $attributes['identifier'] = $bird->identifier;

        $attributes['sex'] = ucfirst($bird->sex);
        $attributes['sex_icon'] = $bird->sex === BirdSexType::Male
            ? 'mars'
            : ($bird->sex === BirdSexType::Female ? 'venus' : 'question');
        $attributes['sex_color'] = $bird->sex === BirdSexType::Male
            ? 'danger'
            : ($bird->sex === BirdSexType::Female ? 'link' : 'grey-light');

        $attributes['hatch'] = $bird->hatch_date !== null
            ? $bird->hatch_date->format('d/m/Y')
            : __('Unknown');

        $attributes['age'] = $bird->hatch_date !== null
            ? $bird->hatch_date->longAbsoluteDiffForHumans($bird->end_date)
            : __('Unknown');

        $attributes['status'] = ucfirst($bird->status);

        $attributes['species'] = $bird->species ? $bird->species->popular_name : null;
        $attributes['cage'] = $bird->cage ? $bird->cage->number : null;

        $attributes['father'] = $bird->father ? $bird->father->identifier : '-';
        $attributes['mother'] = $bird->mother ? $bird->mother->identifier : '-';

        return $attributes;
    }
}
