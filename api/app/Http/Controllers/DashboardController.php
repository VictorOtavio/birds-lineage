<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $birds = Bird::all()->map(fn ($b) => $this->presentBird($b));

        return view('dashboard', compact('birds'));
    }

    /**
     * Prepara os dados para apresentação
     *
     * @param  Bird  $bird
     * @return array
     */
    private function presentBird(Bird $bird): array
    {
        $attributes = $bird->getAttributes();

        $attributes['band'] = '#' . str_pad($bird->id, 5, '0', STR_PAD_LEFT);
        $attributes['gender'] = ucfirst($bird->gender);
        $attributes['gender_icon'] = $bird->gender === 'male' ? 'mars' : 'venus';

        $attributes['father'] = $bird->father ? $bird->father->name : null;
        $attributes['mother'] = $bird->mother ? $bird->mother->name : null;

        $attributes['birth'] = $bird->birth !== null ? $bird->birth->format('d/m/Y') : null;
        $attributes['end'] = $bird->end !== null ? $bird->end->format('d/m/Y') : null;

        return $attributes;
    }
}
