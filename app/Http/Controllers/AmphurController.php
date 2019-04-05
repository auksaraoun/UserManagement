<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Amphur;

class AmphurController extends Controller
{
    public function index(Request $request)
    {
        $response = array();
        $response['menu'] = 'amphur';
        $data = Amphur::paginate(10);
        if ( $request->keyword != '' ) {
            $keyword = $request->keyword;
            $data = Amphur::where('AMPHUR_NAME','LIKE','%'.$keyword.'%')
                        ->paginate(10);
            $data->appends(['keyword' => $keyword]);
        }
        $response['dataTable'] = $data;

        return view('amphur.index')->with($response);
    }

    
    public function create()
    {
        $response = array();
        $response['menu'] = 'amphur';
        $response['province'] = Province::all();

        return view('amphur.create')->with($response);

    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
        $amphur = new Amphur;
        $amphur->AMPHUR_NAME = $request->input('name');
        $amphur->PROVINCE_ID = $request->input('province');
        if($amphur->save()) {
            return redirect('/amphur');
        }
    }

    
    public function getAmphur(Request $request)
    {
        $amphurs = Amphur::where('PROVINCE_ID', $request->id)->get();
        $responsecode = 200;
        $header = array (
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'utf-8'
        );
        
         return response()->json($amphurs , $responsecode, $header, JSON_UNESCAPED_UNICODE);
    }

    public function edit($id)
    {
        $response = array();
        $response['menu'] = 'amphur';
        $response['data'] = Amphur::findOrFail($id);
        $response['province'] = Province::all();
        return view('amphur.edit')->with($response);
    }

   
    public function update(Request $request, $id)
    {
        $amphur = Amphur::findOrFail($id);
        $amphur->AMPHUR_NAME = $request->input('name');
        $amphur->PROVINCE_ID = $request->input('province');
        if($amphur->save()) {
            return redirect('/amphur');
        }
    }

    
    public function destroy($id)
    {
        $amphur = Amphur::findOrFail($id);
        if( $amphur->delete() ) {
            return redirect('/amphur');
        }
    }
}
