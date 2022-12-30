<?php

namespace App\Http\Controllers;

use App\Models\BloodPressureMeasure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BloodController extends Controller
{
    //

    public function index(User $user)
    {
        //$user = auth()->user();
        if (auth()->id() !== $user->id) {
            return Redirect::route('blood.user', auth()->user());
        }
        //dd($user->bloodpressuremeasures()->get());
        // $bloods = BloodPressureMesure::findOrFail()->get();
        return Inertia::render(
            'Blood',
            ['measures' => $user->bloodpressuremeasures]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'high' => 'required',
            'low' => 'required',
            'bps' => 'required'
        ]);
        $new_mesure = Arr::add(
            $request->only('high', 'low', 'bps'),
            'user_id',
            auth()->id()
        );
        BloodPressureMeasure::create($new_mesure);
        return Redirect::route('blood.user', auth()->user());
    }

    public function destroy(BloodPressureMeasure $blood_pressure_measure)
    {
        $deleted = $blood_pressure_measure->delete();
        if ($deleted) {
            return Redirect::route('blood.user', auth()->user(), 303);
        }
    }
}
