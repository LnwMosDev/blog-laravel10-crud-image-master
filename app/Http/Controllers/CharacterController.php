<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Character\StoreRequest; // Import StoreRequest for Character
use App\Http\Requests\Character\UpdateRequest; // Import UpdateRequest for Character
use App\Models\Character; // Import Character Model

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
{
    $characters = Character::orderBy('updated_at', 'desc')->paginate(5);

    // return view('characters.index', compact('characters'));
    return Response()->view('characters.index',['characters'=>$characters]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('characters.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/characters/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        if ($request->hasFile('model_img')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/characters/featured-images', request()->file('model_img'));
            $validated['model_img'] = $filePath;
        }

        // insert only requests that already validated in the StoreRequest
        $create = Character::create($validated);

        if($create) {
            // add flash for the success notification
            session()->flash('notif.success', 'Character created successfully!');
            return redirect()->route('characters.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('characters.show', [
            'character' => Character::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('characters.form', [
            'character' => Character::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $character = Character::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete old image
            Storage::disk('public')->delete($character->featured_image);

            $filePath = Storage::disk('public')->put('images/characters/featured-images', request()->file('featured_image'));
            $validated['featured_image'] = $filePath;
        }

        if ($request->hasFile('model_img')) {
            // delete old image
            Storage::disk('public')->delete($character->model_img);

            $filePath = Storage::disk('public')->put('images/characters/featured-images', request()->file('model_img'));
            $validated['model_img'] = $filePath;
        }

        $update = $character->update($validated);

        if($update) {
            session()->flash('notif.success', 'Character updated successfully!');
            return redirect()->route('characters.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $character = Character::findOrFail($id);


        if (Storage::disk('public')->exists($character->featured_image)) {
            Storage::disk('public')->delete($character->featured_image);
        }

        $delete = $character->delete();

        if($delete) {
            session()->flash('notif.success', 'Character deleted successfully!');
            return redirect()->route('characters.index');
        }

        return abort(500);
    }
}
