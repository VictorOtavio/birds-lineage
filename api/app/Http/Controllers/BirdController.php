<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use Illuminate\Http\Request;
use App\Enums\BirdStatusType;
use App\Http\Resources\Bird as BirdResource;

class BirdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birds = Bird::where('status', BirdStatusType::Available)
            ->orderBy('hatch_date')
            ->get();

        return BirdResource::collection($birds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->input();

        $bird = new Bird($input);
        $bird->save();

        return new BirdResource($bird);
    }

    /**
     * Display the specified resource.
     *
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function show(Bird $bird)
    {
        return new BirdResource($bird);
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
        $input = $request->input();

        $bird->fill($input);
        $bird->save();

        return new BirdResource($bird);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bird  $bird
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bird $bird)
    {
        $bird->delete();

        return response()->json(null, 204);
    }
}
