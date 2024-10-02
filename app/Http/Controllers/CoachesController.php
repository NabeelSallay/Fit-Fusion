<?php

namespace App\Http\Controllers;

use App\Models\coaches;
use App\Http\Requests\StorecoachesRequest;
use App\Http\Requests\UpdatecoachesRequest;
use App\Models\Connection;
use App\Models\User;
use Illuminate\Http\Request;


class CoachesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('coaches.index', [
            'coaches' => coaches::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecoachesRequest $request)
    {
        $validated = $request->validated();

        //create the slug
        $validated['slug'] = \Str::slug($validated['name']);

        coaches::create($validated);
        $user = auth()->user();
        $user->update(['role' => 'coach']);

        return redirect()->route('home')
            ->with('flash.banner', 'coach profile created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coaches = coaches::findOrFail($id);
        return view('coaches.show', compact('coaches'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coaches = coaches::findOrFail($id);

        return view('coaches.edit', compact('coaches'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecoachesRequest $request, coaches $coach)
    {
        $validated = $request->validated();
        $validated['slug'] = \Str::slug($validated['name']);
        $coach->update($validated);

        if (auth()->user()->role === 'admin') {
            return redirect()->route('coaches.index')
                ->with('flash.banner', 'Coach information edited successfully');
        } else {
            return redirect()->route('coach.profile')
                ->with('flash.banner', 'Information edited successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(coaches $coach)
    {
        $coach->delete();
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('coaches.index')
            ->with('flash.banner', 'coach deleted successfully');
    }

    public function viewProfile()
    {
        $coach = auth()->user()->coach;
        return view('coaches.view_profile' , compact('coach'));
    }

    public function editProfile(){
        $coach = auth()->user()->coach;
        return view('coaches.edit_profile' , compact('coach'));
    }

    public function coachIndex()
    {

        return view('coaches.coaches_index', [
            'coaches' => coaches::paginate(10)
        ]);
    }

    public function search(Request $request)
    {
        $query = coaches::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('specialty')) {
            $specialties = explode(',', $request->specialty);
            $query->where(function ($q) use ($specialties) {
                foreach ($specialties as $specialty) {
                    $q->orWhere('training_approach', 'like', '%' . trim($specialty) . '%');
                }
            });
        }

        if ($request->filled('experience')) {
            $query->where('experience', '>=', $request->experience);
        }

        if ($request->filled('age_min')) {
            $query->where('age', '>=', $request->age_min);
        }

        if ($request->filled('age_max')) {
            $query->where('age', '<=', $request->age_max);
        }

        $coaches = $query->paginate(10)->appends($request->all());

        return view('coaches.coaches_index', compact('coaches'));
    }

    public function viewCoachProfile($id)
    {
        $coach = User::findOrFail($id);
        $clientId = auth()->id();

        // Fetch the connection status
        $connection = Connection::where('coach_id', $id)
            ->where('client_id', $clientId)
            ->first();

        return view('coaches.view_coach_profile', compact('coach', 'connection'));
    }

    public function coachDashboard()
    {
        $coachId = auth()->id();
        $connectionRequests = Connection::where('coach_id', $coachId)
            ->where('status', 'pending')
            ->with('client')
            ->latest()
            ->get();

        return view('coaches.coach_dashboard', compact('connectionRequests'));
    }

}
