<?php

namespace App\Http\Controllers;

use App\Audittype;
use Illuminate\Http\Request;

class AudittypeController extends Controller
{
    public function index()
    {
        $data2 = Audittype::all();
        return view('index', compact('data2'));
        //return view('welcome');
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
     * @param  \App\Audittype  $audittype
     * @return \Illuminate\Http\Response
     */
    public function show(Audittype $audittype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Audittype  $audittype
     * @return \Illuminate\Http\Response
     */
    public function edit(Audittype $audittype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Audittype  $audittype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audittype $audittype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Audittype  $audittype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audittype $audittype)
    {
        //
    }
}
