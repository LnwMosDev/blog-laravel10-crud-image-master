<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
// use App\Http\Requests\Character\StoreRequest;
// use App\Http\Requests\Character\UpdateRequest;
use App\Models\Character; // Import Character Model

use App\Models\CityList;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;

class CityManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // return response()->view('citys.index', [
        //     'citys' => CityList::orderBy('updated_at', 'desc')->get(),
        // ]);

        $citys = CityList::orderBy('updated_at', 'asc')->paginate(5);
        // return view('citys.index', compact('citys'));
        return Response()->view('citys.index', ['citys' => $citys]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('citys.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('city_img')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/citys/city_img', request()->file('city_img'));
            $validated['city_img'] = $filePath;
        }


        // insert only requests that already validated in the StoreRequest
        $create = CityList::create($validated);

        if ($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Character created successfully!');
            return redirect()->route('citys.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $city_id): Response
    {
        return response()->view('citys.show', [
            'city' => CityList::findOrFail($city_id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $city_id): Response
    {
        return response()->view('citys.form', [
            'city' => CityList::findOrFail($city_id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $city_id): RedirectResponse
    {
        $city = CityList::findOrFail($city_id);
        $validated = $request->validated();

        if ($request->hasFile('city_img')) {
            // delete old image
            Storage::disk('public')->delete($city->city_img);

            $filePath = Storage::disk('public')->put('images/citys/featured-images', request()->file('city_img'));
            $validated['city_img'] = $filePath;
        }


        $update = $city->update($validated);

        if ($update) {
            session()->flash('notif.success', 'city updated successfully!');
            return redirect()->route('citys.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $city_id): RedirectResponse
    {
        $city = CityList::findOrFail($city_id);

        Storage::disk('public')->delete($city->city_img);

        $delete = $city->delete();

        if ($delete) {
            session()->flash('notif.success', 'city deleted successfully!');
            return redirect()->route('citys.index');
        }

        return abort(500);
    }
}
