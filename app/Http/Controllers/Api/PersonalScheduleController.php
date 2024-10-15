<?php

namespace App\Http\Controllers;

use App\Models\PersonalSchedule;
use App\Http\Requests\StorePersonalScheduleRequest;
use App\Http\Requests\UpdatePersonalScheduleRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonalScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonalScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalSchedule $personalSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalSchedule $personalSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonalScheduleRequest $request, PersonalSchedule $personalSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalSchedule $personalSchedule)
    {
        //
    }

    public function attachPersonalSchedule(Request $request, $personId)
    {
        // Retrieve the person based on the provided ID
        $person = Person::findOrFail($personId);

        // Get the ID of the personal schedule to attach (assuming it's in the request)
        $personalScheduleId = $request->input('personal_schedule_id');

        // Attach the personal schedule to the person
        $person->personalSchedules()->attach($personalScheduleId);

        // You can redirect back or return a response as needed
    }
}
