<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Http\Requests\StoreclientsRequest;
use App\Http\Requests\UpdateclientsRequest;
use App\Models\Connection;
use App\Models\workout;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => clients::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreclientsRequest $request)
    {
        $validated = $request->validated();

        //create the slug
        $validated['slug'] = \Str::slug($validated['name']);

        clients::create($validated);

        $user = auth()->user();
        $user->update(['role' => 'client']);

        return redirect()->route('home')
            ->with('flash.banner', 'Profile created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(clients $client)
    {
        return view('clients.show', [
            'clients' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(clients $client)
    {
        return view('clients.edit', [
            'clients' => $client
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateclientsRequest $request, clients $client)
    {
         $validated = $request->validated();

        //create the slug
        $validated['slug'] = \Str::slug($validated['name']);

        $client->update($validated);

        if (auth()->user()->role === 'admin') {
            return redirect()->route('clients.index')
                ->with('flash.banner', 'client information edited successfully');
        } else {
            return redirect()->route('clients.profile')
                ->with('flash.banner', 'Information edited successfully');
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(clients $client)
    {
        $model = $client;

        $model->delete();

        //set the banner status to danger
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('clients.index')
            ->with('flash.banner', 'clients' . $model->name . 'deleted successfully');
    }

    public function viewProfile()
    {
        $client = auth()->user()->client;
        return view('clients.view_profile' , compact('client'));
    }

    public function editProfile()
    {
        $client = auth()->user()->client;
        return view('clients.edit_profile' , compact('client'));
    }

    public function search(Request $request)
    {
        $query = clients::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('goal')) {
            $goals = explode(',', $request->goal);
            $query->where(function ($q) use ($goals) {
                foreach ($goals as $goal) {
                    $q->orWhere('goal', 'like', '%' . trim($goal) . '%');
                }
            });
        }

        if ($request->filled('activity_level')) {
            $query->where('activity_level', $request->activity_level);
        }

        if ($request->filled('age_min')) {
            $query->where('age', '>=', $request->age_min);
        }

        if ($request->filled('age_max')) {
            $query->where('age', '<=', $request->age_max);
        }

        if ($request->filled('weight_min')) {
            $query->where('weight', '>=', $request->weight_min);
        }

        if ($request->filled('weight_max')) {
            $query->where('weight', '<=', $request->weight_max);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status === 'active');
        }

        $clients = $query->paginate(10)->appends($request->all());

        return view('clients.clients_index', compact('clients'));
    }

    public function clientIndex()
    {
        return view('clients.clients_index', [
            'clients' => clients::paginate(10)
        ]);
    }

    public function viewClientProfile($id)
    {
        $client = clients::findOrFail($id);
        $coachId = auth()->id();

        $connection = Connection::where('client_id', $id)
            ->where('coach_id', $coachId)
            ->first();
        return view('clients.view_client_profile', compact('client', 'connection'));
    }

    public function clientDashboard()
    {
        $clientId = auth()->id();

        $connections = Connection::where('client_id', $clientId)
            ->where('status', 'pending')
            ->with('coach')
            ->get();

        return view('clients.client_dashboard', compact('connections'));
    }
}
