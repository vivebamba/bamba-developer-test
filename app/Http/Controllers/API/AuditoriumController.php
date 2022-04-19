<?php

namespace App\Http\Controllers\API;

use App\Models\Auditorium;
use App\Http\Controllers\Controller;

class AuditoriumController extends Controller
{
    /**
     * Display all Auditoriums.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auditoriums= Auditorium::with('schedules', 'seats')->get();
        return response()->json(compact('auditoriums'));
    }

    /**
     * Display the specified Auditorium by id.
     * @param  Number $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auditorium= Auditorium::with('seats')->find($id);
        return response()->json(compact('auditorium'));
    }
}
