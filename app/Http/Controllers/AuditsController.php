<?php

namespace App\Http\Controllers;

use App\Audits;
use Illuminate\Http\Request;

class AuditsController extends Controller
{
    
    public function index()
    {
        $data1 = Audits::all();
        return view('index', compact('data1'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
      
        $content = json_decode($request->getContent(),true);
        Audits::insert($content);
        return response()->json(['success'=> true, 'message' => 'ok'], 200);
    }

    public function show(Audits $audits)
    {        
        $data = Audits::all();        
        return response()->json(['success'=> true, 'data' =>$data, 'message' => 'ok'], 200); 
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        $audit2 = Audits::find($id);
        $content = json_decode($request->getContent(),true);
        $audit2->User = $content['User'];
        $audit2->Name = $content['Name'];
        $audit2->Description = $content['Description'];
        $audit2->save();          
        return response()->json(['success'=> true, 'message' => 'ok'], 200);
    }

   
    public function destroy($id)
    {
        $audit3 = Audits::find($id);
        $audit3->delete();
    }
}
