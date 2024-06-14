<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vehicle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ControlVehicle extends Controller
{
    public function home(){
        return view("home",["key"=> "home"]);
    }

    public function vehicle(){
        $vehicles = vehicle::orderBy('id','desc')->get();
        return view("vehicle", ["key"=>"vehicle","vh" => $vehicles]);
    }

    public function FormAddVehicle(){
        return view("form-add",["key" => "vehicle"]);
    }

    public function save(Request $request){
        $file_name = time().'-'.$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('image',$file_name, 'public');

        vehicle::create([
            'merek' => $request->merek,
            'model' => $request->model,
            'jenis' => $request->jenis,
            'year' => $request->year,
            'harga' => $request->harga,
            'image' => $path
        ]);

        return redirect('/vehicle')->with('alert', 'Data Di Simpan');
    }

    public function FormEditVehicle($id){
        $vehicles = vehicle::find($id);
        return view("form-edit",["key"=>"vehicle","vh"=>$vehicles]);
    }

    public function updateVehicle($id,Request $request){
        $vehicles = vehicle::find($id);
        $vehicles->merek = $request->merek;
        $vehicles->model = $request->model;
        $vehicles->jenis = $request->jenis;
        $vehicles->year = $request->year;
        $vehicles->harga = $request->harga;

        if($request->image)
        {
            if($vehicles->image)
            {
                Storage::disk('public')->delete($vehicles->image);
            }
            $file_name = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('image',$file_name, 'public');
            $vehicles->image=$path;
        }
        $vehicles->save();

        return redirect("/vehicle")->with('alert','Data Diubah');
    } 

    public function deleteVehicle($id){
        $vehicles = vehicle::find($id);

        if($vehicles->image){
            Storage::disk('public')->delete($vehicles->image);
        }
            
        $vehicles->delete();

        return redirect("/vehicle")->with('alert','Data Dihapus');
    }

    public function login()
    {
        return view("login");
    }

    public function FormUser()
    {
        return view("form-user",["key"=>""]);
    }

    public function updateUser(Request $request){
        if($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user(); //Mendapatkan INFORMASI
            $user->password = bcrypt($request->password_baru);
            $user->save();

            return redirect("/user")->with("info","Password Berhasil di Ubah");
        }
        else
        {
            return redirect("/user")->with("info","Password Gagal di Ubah");
        }
    }

}
