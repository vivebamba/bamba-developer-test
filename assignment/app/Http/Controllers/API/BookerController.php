<?php

namespace App\Http\Controllers\API;

use App\Models\Booker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BookerController extends Controller
{

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
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function edit(Booker $booker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booker $booker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booker  $booker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booker $booker)
    {
        //
    }
}
