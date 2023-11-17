<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fiche1;
use DB;

class F1Controller extends Controller
{
    public function list()
    {
        return view('f1.list');
    }
    
    public function create()
    {
        $csps = DB::table("csp")->get();
    
        return view('f1.create',compact('csps'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'csp_id' => 'required|exists:csp,id',
            'nom' => 'required|string',
            'age' => 'required|integer',
            'tel' => 'string|required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        
        $datas = $request->except('_token ');
        if ($request->hasFile('photo')){
            $nom=$request['photo']->getClientOriginalName();
            $path='photo-'.date("H-i-s").'_'.$nom;
            $request['photo']->move(public_path().'/images/fiche1', $path);
            $dbImage = 'images/fiche1'.'/'.$path;
            $datas['photo'] = $dbImage;
        }
        $datas['slug'] = uniqid();
        $result = Fiche1::create($datas);
        return redirect()->route('f1.qr', $result->id);
    }
    
    public function qr($id)
    {
        $fiche = Fiche1::where('id', $id)->first();
        if(!$fiche){
            abort(404);
        }
        $url = route('f1.edit', $fiche->slug);
        return view('f1.qr', compact('id','url'));
    }
    
    public function edit($slug)
    {
        $fiche = Fiche1::where('slug', $slug)->first();
        $csps = DB::table("csp")->get();
        return view('f1.edit',compact('fiche', 'csps'));
    }
    
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'csp_id' => 'required|exists:csp,id',
            'nom' => 'required|string',
            'age' => 'required|integer',
            'tel' => 'string|required',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        ]);
        
        $datas = $request->all();
        if ($request->hasFile('photo')){
            $nom=$request['photo']->getClientOriginalName();
            $path='photo-'.date("H-i-s").'_'.$nom;
            $request['photo']->move(public_path().'/images/fiche1', $path);
            $dbImage = 'images/fiche1'.'/'.$path;
            $datas['photo'] = $dbImage;
        }
        
        unset($datas['_token']);
        unset($datas['slug']);
        $result = Fiche1::where('id', $id)->update($datas);
        return redirect()->route('f1.qr', $id);
    }
}
