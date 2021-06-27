<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarModificationRequest;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\CarModification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;

class CarModificationController extends Controller
{
    public function __construct(Request $request)
    {
        if(!$request->carId)
            return abort(404);
    }


    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {

        $mods = CarModification::sortable('id')->where('car_id', $request->carId)->paginate(50);


        return view('profile.mod.index', ['mods' => $mods, 'carId' => $request->carId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        return view('profile.mod.create', ['carId' => $request->carId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CarModificationRequest $carModificationRequest
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CarModificationRequest $carModificationRequest)
    {

        $mod = new CarModification();
        $mod->title = $carModificationRequest->title;
        $mod->car_id = $carModificationRequest->carId;
        $mod->from_made = $carModificationRequest->from_made;
        $mod->to_made = $carModificationRequest->to_made;
        $mod->generation = $carModificationRequest->generation;
        $mod->save();

        return redirect(route('modification.index', ['carId' => $mod->car_id]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function edit(Request $request)
    {
        $carModification = CarModification::findOrFail($request->modification);

        return view('profile.mod.edit', ['carModification' => $carModification]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CarModificationRequest $carModificationRequest
     * @return Application|Redirector|RedirectResponse
     */
    public function update(CarModificationRequest $carModificationRequest)
    {
        $carModification = CarModification::findOrFail($carModificationRequest->modification);
        $carModification->title = $carModificationRequest->title;
        $carModification->from_made = $carModificationRequest->from_made;
        $carModification->to_made = $carModificationRequest->to_made;
        $carModification->generation = $carModificationRequest->generation;

        $carModification->save();

        return redirect(route('modification.index', ['carId' => $carModification->car_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Request $request)
    {
        $carModification = CarModification::findOrFail($request->modification);
        $carModification->delete();

        return redirect(route('modification.index', ['carId' => $carModification->car_id]));
    }
}
