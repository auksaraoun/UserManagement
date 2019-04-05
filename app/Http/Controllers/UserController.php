<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;
use App\Province;
use App\Amphur;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = array();
        $response['menu'] = 'user';
        $data = DB::table('users')->join('provinces','province','=','PROVINCE_ID')->join('amphurs','amphur','=','AMPHUR_ID')->paginate(10);
        if ( $request->keyword != '' ) {
            $keyword = $request->keyword;
            $data = DB::table('users')->join('provinces','province','=','PROVINCE_ID')
                        ->join('amphurs','amphur','=','AMPHUR_ID')
                        ->where('firstname','LIKE','%'.$keyword.'%')
                        ->orWhere('lastname','LIKE','%'.$keyword.'%')
                        ->orWhere('email','LIKE','%'.$keyword.'%')
                        ->orWhere('tel','LIKE','%'.$keyword.'%')
                        ->paginate(10);
            $data->appends(['keyword' => $keyword]);
        }
        $response['dataTable'] = $data;

        return view('users.index')->with($response);
    }

    
    public function create()
    {
        $response = array();
        $response['menu'] = 'user';

        $province = Province::all();
        $amphur = Amphur::all();
        $amphurs = $amphur->where('PROVINCE_ID',1)->all();
        $response['province'] = $province;
        $response['amphur'] = $amphur;
        return view('users.create')->with($response);
    }

    
    public function store(Request $request)
    {

        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'tel' => 'required|numeric|',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required|string',
            'province' => 'required|numeric|max:255',
            'amphur' => 'required',
            'zipcode' => 'required|numeric|',
            'password' => 'required|string|min:6|',
        ]);
        $response = array();
        $response['menu'] = 'user';

        $user = new User;
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->province = $request->input('province');
        $user->amphur = $request->input('amphur');
        $user->zipcode = $request->input('zipcode');
        $user->password = bcrypt($request->input('password'));

        if($user->save()) {
            return redirect('/user');
        }

    }

    
    public function show($id)
    {
    }

  
    public function edit($id)
    {
        $response = array();
        $province = Province::all();
        $amphur = Amphur::all();
        $response['data'] = User::findOrFail($id);
        $response['menu'] = 'user';
        $response['province'] = $province;
        $response['amphur'] = $amphur;

        return view('users.edit')->with($response);
    }

  
    public function update(Request $request, $id)
    {
       $user = User::findOrFail($id);
       $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'tel' => 'required|numeric|',
            'email' => "required|email|max:255|unique:users,email,".$user->id.",id", 
            'address' => 'required|string',
            'province' => 'required|numeric|max:255',
            'amphur' => 'required',
            'zipcode' => 'required|numeric|',
            'password' => 'min:6|nullable',
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->tel = $request->input('tel');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->province = $request->input('province');
        $user->amphur = $request->input('amphur');
        $user->zipcode = $request->input('zipcode');
        if( $request->input('password') != '' ) {
            $user->password = bcrypt($request->input('password'));
        }
        if($user->save()) {
            return redirect('/user');
        }

    }

    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if( $user->delete() ) {
            return redirect('/user');
        }
    }
}
