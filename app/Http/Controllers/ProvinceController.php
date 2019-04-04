<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;

class ProvinceController extends Controller
{
    
    public function index(Request $request)
    {
        $response = array();
        $response['menu'] = 'province';
        $data = Province::paginate(10);
        if ( $request->keyword != '' ) {
            $keyword = $request->keyword;
            $data = Province::where('PROVINCE_NAME','LIKE','%'.$keyword.'%')
                        ->paginate(10);
            $data->appends(['keyword' => $keyword]);
        }
        $response['dataTable'] = $data;

        return view('province.index')->with($response);
    }   

    
    public function create()
    {
        $response = array();
        $response['menu'] = 'province';

        return view('province.create')->with($response);
    }

   
    public function store(Request $request)
    {
         $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);

         $province = new Province;
         $province->PROVINCE_NAME = $request->input('name');
         if($province->save()) {
            return redirect('/province');
         }
    }

    
    public function show($id)
    {
        //
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
