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
        /*$audit1 = new Audits();
        $audit1->User = $request->post('inputName');
        $audit1->Name = $request->post('inputTipo2');
        $audit1->Description = $request->post('inputD');
        $audit1->save();*/
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
        //$audtis = Audits::find($id);
        //return view("actualizar", compact($audits));
        //echo($id);
    }

    
    public function update(Request $request, $id)
    {
        $content = json_decode($request->getContent(),true);
        /*$audit2 = Audits::find($id);
        $audit2->User = $request->post('name');
        $audit2->Name = $request->post('tipo');
        $audit2->Description = $request->post('desc');
        $audit2->save();*/       
       
        return response()->json(['success'=> true, 'message' => 'ok'], 200);

    }

   
    public function destroy($id)
    {
        $audit3 = Audits::find($id);
        $audit3->delete();
    }
}
