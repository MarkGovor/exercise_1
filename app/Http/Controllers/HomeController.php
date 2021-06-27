<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Main page
     * @return Application|Factory|View
     */
    public function index()
    {
        $cars = Car::with('modifications')->limit(2)->get();

        $maxGeneration = CarModification::max('generation');
        $mods = CarModification::where('generation', $maxGeneration)->with('car')->limit(5)->get();

        return view('index', ['cars' => $cars, 'mods' => $mods]);
    }

    /**
     * Подробнее о машине
     * @param Request $request
     * @return Application|Factory|View
     */
    public function view(Request $request){

        $car = Car::findOrFail($request->carId);

        return view('view', compact('car'));
    }
}
