<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $cars = Car::sortable('id')->paginate(50);


        return view('profile.car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('profile.car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarRequest $carRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CarRequest $carRequest)
    {
        $car = new Car();
        $car->title = $carRequest->title;
        $car->from_made = $carRequest->from_made;
        $car->to_made = $carRequest->to_made;

        // такие вещи надо бы в сервис, чтобы солид не нарушать
        if ($carRequest->has('image')) {
            $carRequest->image->store('cars', 'public');
            $car->image = 'cars/' . $carRequest->image->hashName();
        }else{
            $car->image =  'cars/default.png';
        }

        $car->save();

        return redirect(route('cars.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car $car
     * @return Application|Factory|View
     */
    public function edit(Car $car)
    {
        return view('profile.car.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarRequest $carRequest
     * @param \App\Models\Car $car
     * @return Response
     */
    public function update(CarRequest $carRequest, Car $car)
    {
        $car->title = $carRequest->title;
        $car->from_made = $carRequest->from_made;
        $car->to_made = $carRequest->to_made;

        // такие вещи надо бы в сервис, чтобы солид не нарушать
        if ($carRequest->has('image')) {
            $carRequest->image->store('cars', 'public');
            $car->image = '/cars/' . $carRequest->image->hashName();
        }else{
            $car->image =  '/cars/default.png';
        }

        $car->save();

        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return redirect(route('cars.index'));
    }
}
