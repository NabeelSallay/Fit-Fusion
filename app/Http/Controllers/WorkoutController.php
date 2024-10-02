<?php

namespace App\Http\Controllers;

use App\Models\workout;
use App\Http\Requests\StoreworkoutRequest;
use App\Http\Requests\UpdateworkoutRequest;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workout.index', [
            'workouts' => workout::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workout.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreworkoutRequest $request)
    {
        $validated = $request->validated();

        //create the slug
        $validated['slug'] = \Str::slug($validated['plan_name']);

        workout::create($validated);

        return redirect()->route('workout.index')
        ->with('flash.banner', 'workout created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(workout $workout)
    {
        return view('workout.show', [
            'workout' => $workout
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(workout $workout)
    {
        return view('workout.edit', [
            'workout' => $workout
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateworkoutRequest $request, workout $workout)
    {


        $workout->update($request->validated());

        return redirect()->route('workout.index')
        ->with('flash.banner', 'workout updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(workout $workout)
    {
        $model = $workout;

        $model->delete();

        //set the banner status to danger
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('workout.index')
            ->with('flash.banner', 'workout' . $model->plan_name . 'deleted successfully');
    }
}
