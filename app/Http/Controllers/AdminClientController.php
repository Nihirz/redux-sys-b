<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\AdminClient;
// use Illuminate\Support\Facades\App\Client;
use App\Client;
use Illuminate\Support\Facades\DB;

class AdminClientController extends Controller
{
    public function index()
    {
        $client = DB::table('clients')->paginate(10);
        return view('adminClient', compact('client'));
    }
    public function addnew()
    {
        return view('newclient');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:clients,email',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $client = Client::updateOrCreate(
            [
                'id'=>$request->id,
            ],
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ]
        );
        return redirect()->route('admin.client')->with('success', 'Client created successfully.');
    }
    public function edit($id)
    {
        $client=Client::where('id', $id)->first();
        return view('editclient', compact('client'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|unique:clients,email,'.$this->id,
            'phone'=>'required',
            'address'=>'required',
        ]);
        $client = Client::find($request->id);
        $client->name=$request->input('name');
        $client->email=$request->input('email');
        $client->phone=$request->input('phone');
        $client->address=$request->input('address');
        $client->save();
        return redirect()->route('admin.client')->with('success', 'edit product Updated Successfully!');
    }

    public function delete($id)
    {
        $client = Client::where('id', $id)->delete();
        return redirect()->back();
    }
    public function new($id)
    {
        $client = Client::find($id);
        return view('viewDetail');
    }
}
