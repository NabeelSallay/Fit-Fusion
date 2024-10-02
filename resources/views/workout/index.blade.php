@extends('layouts.admin_dashboard')
@section('content')

<x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('workout') }}
        </h2>
   </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

               <table class="table-auto w-full">
                   <thead>
                       <tr>
                           <th class="px-4 py-2">Plan Name</th>
                           <th class="px-4 py-2">Description</th>
                           <th class="px-4 py-2">Goal</th>
                           <th class="px-4 py-2">Duration</th>
                           <th class="px-4 py-2">Level</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach($workouts as $workouts)
                           <tr>

                               <td class="border px-4 py-2">{{ $workouts->plan_name }}</td>
                               <td class="border px-4 py-2">{{ $workouts->description }}</td>
                               <td class="border px-4 py-2">{{ $workouts->goal }}</td>
                               <td class="border px-4 py-2">{{ $workouts->duration }}</td>
                               <td class="border px-4 py-2">{{ $workouts->level }}</td>
                               <td class="border px-4 py-2">
                                <a href="{{ route('workout.show', $workouts->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                <a href="{{ route('workout.edit', $workouts->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                               <form action="{{ route('workout.destroy', $workouts->id) }}" method="POST">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit"
                                           onclick="return confirm('Are you sure you want to delete this item?');"
                                           class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                 </form>
                                 </td>
                           </tr>
                       @endforeach
                   </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
