<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Auditorium;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class AuditoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditoriums= Auditorium::with('schedules', 'seats')->get();
        return response()->json(compact('auditoriums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auditorium= Auditorium::with('seats')->find($id);
        return response()->json(compact('auditorium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function edit(Auditorium $auditorium)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auditorium $auditorium)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auditorium  $auditorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auditorium $auditorium)
    {
        //
    }
}
