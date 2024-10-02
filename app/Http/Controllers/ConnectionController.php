<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $coachId = auth()->id();
        $connectionRequests = Connection::where('coach_id', $coachId)
            ->where('status', 'pending')
            ->with('client')
            ->latest()
            ->get();

        return view('coaches.coach_dashboard', compact('connectionRequests'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'coach_id' => 'required|exists:users,id', // Ensure the coach exists in the users table
            'message' => 'nullable|string|max:500', // Optional message
        ]);

        $clientId = auth()->id(); // Get the authenticated client's ID

        // Check if a connection already exists
        $existingConnection = Connection::where('coach_id', $validated['coach_id'])
            ->where('client_id', $clientId)
            ->first();

        if ($existingConnection) {
            return redirect()->back()->withErrors(['connection' => 'Connection request already exists.']);
        }

        // Create the connection request
        Connection::create([
            'coach_id' => $validated['coach_id'],
            'client_id' => $clientId,
            'message' => $validated['message'],
            'initiated_by' => $clientId,
            'status' => 'pending', // Set initial status to pending
        ]);

        return redirect()->back()->with('success', 'Connection request sent successfully!');
    }

    public function accept(Connection $connection)
    {
        $this->authorize('update', $connection);

        $connection->update(['status' => 'accepted']);

        return redirect()->route('coach.accepted_requests')->with('success', 'Connection request accepted.');
    }

    public function reject(Connection $connection)
    {
        $this->authorize('update', $connection);

        $connection->update(['status' => 'rejected']);

        return redirect()->route('connections.index')->with('success', 'Connection request rejected.');
    }
    public function cancel(Connection $connection)
    {
        if ($connection->client_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $connection->delete();

        return redirect()->route('client.dashboard')->with('success', 'Connection request canceled successfully.');
    }

    public function acceptedRequests()
    {
        $clientId = auth()->id();

        $connections = Connection::where('client_id', $clientId)
            ->where('status', 'accepted')
            ->with('coach')
            ->get();

        return view('clients.accepted_requests', compact('connections'));
    }

    public function acceptedRequestsForCoach()
    {
        $coachId = auth()->id();

        $connections = Connection::where('coach_id', $coachId)
            ->where('status', 'accepted')
            ->with('client')
            ->get();

        return view('coaches.accepted_requests_coach', compact('connections'));
    }
}
