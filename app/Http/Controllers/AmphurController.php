<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\Amphur;

class AmphurController extends Controller
{
    public function index(Request $request,$id)
    {
        $response = array();
        $response['menu'] = 'province';
        $data = Amphur::where('PROVINCE_ID', $id)->paginate(10);
        if ( $request->keyword != '' ) {
            $keyword = $request->keyword;
            $data = Amphur::where('PROVINCE_ID',$data)
                        ->orWhere('AMPHUR_NAME','LIKE','%'.$keyword.'%')
                        ->paginate(10);
            $data->appends(['keyword' => $keyword]);
        }
        $province = Province::where('PROVINCE_ID',$id)->first();
        $response['dataTable'] = $data;
        $response['province'] = $province;

        return view('amphur.index')->with($response);
    }

    
    public function create($id)
    {
        $response = array();
        $response['menu'] = 'province';
        $response['province'] = Province::where('PROVINCE_ID',$id)->first();

        return view('amphur.create')->with($response);

    }

    
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);


        $amphur = new Amphur;
        $amphur->AMPHUR_NAME = $request->input('name');
        $amphur->PROVINCE_ID = $id;
        if($amphur->save()) {
            return redirect('/province/'.$id.'/amphur');
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
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
