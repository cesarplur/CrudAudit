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
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {        
        $content = json_decode($request->getContent(),true);
        Audittype::insert($content);
        return response()->json(['success'=> true, 'message' => 'ok'], 200);
    }

    
    public function show(Audittype $audittype)
    {
        //
    }

    public function edit(Audittype $audittype)
    {
        //
    }

    public function update(Request $request, Audittype $audittype)
    {
        //
    }

    public function destroy(Audittype $audittype)
    {
        //
    }
}
