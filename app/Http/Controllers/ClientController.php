<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();
        return view('client',compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|max:50',
            'client_contact' => 'nullable',
            'client_serial'=>'nullable|numeric',
            'client_image' => 'required|mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $file = $request['client_image'];
        $ext = strtolower($file->getClientOriginalExtension());
        $file_full_name = 'client-' . date('YmdHis') . '.' . $ext;
        $file->storeAs('client_photo', $file_full_name, 'public');

        Client::firstOrCreate([
            'name' => $request->client_name,
            'contact' => $request->client_contact,
            'order' => $request->client_serial,
            'photo' => $file_full_name,
        ]);
        return redirect()->back()->with('notification','New client is added successfully!');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'update_client_name' => 'required|max:50',
            'update_client_contact' => 'nullable',
            'update_client_serial'=>'nullable|numeric',
            'update_client_image' => 'mimes:jpeg,jpg,bmp,png|max:5000',
        ]);

        $client = Client::find($id);
        $file_full_name = $client->photo;

        if(isset($request['update_client_image']))
        {
            Storage::delete('/public/client_photo/'.$file_full_name);
            $file = $request['update_client_image'];
            $ext = strtolower($file->getClientOriginalExtension());
            $file_full_name = 'client-' . date('YmdHis') . '.' . $ext;
            $file->storeAs('client_photo', $file_full_name, 'public');
        }

        $client->update([
            'name' => $request->update_client_name,
            'contact' => $request->update_client_contact,
            'order' => $request->update_client_serial,
            'status' => $request->update_status,
            'photo' => $file_full_name,
        ]);
        return redirect()->back()->with('notification','Client is updated successfully!');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        Storage::delete('/public/client_photo/'.$client['photo']);
        $client->delete();
        return redirect()->back()->with('notification','Client is deleted successfully!');
    }
}
