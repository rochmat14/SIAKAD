<?php

namespace App\Http\Controllers;

// memanggil model User
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() 
    {
        // mencari data tabel User berdasarkan role admin
        $admin = User::where('role', 'admin')->orderBy('id', 'DESC')->get();
        
        return view('admin.index', compact('admin'));
    }

    public function register(Request $request){
        // menambah data user yang dibungkus variabel "$user"
        $user = new User;

        // sebelah kiri nama item table dan sebelah kanan request, input field
        $user->noRef = "UR";
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->remember_token  = str_random(10);
        $user->role = "admin";

        // simpan data variable "$user"
        $user->save();

        // jika vauribel user berhasil di jalankan dan tidak terjadi kesalahan
        if($user == true){

            // maka redirect menuju url "/register-admin"
            return redirect('/register-admin')->with('message', "berhasil registrasi, silakan login");
        }
    }
    
    public function edit($id)
    {
        // mencari data pada table User berdasarkan id
        // jika menggunakan find hanya bisa mencari id saja. tapi jika menggunakan where bisa sesuai keinginan
        $admin = User::find($id);

        // menampilkan view yaitu file edit pada folder admin
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // mencari data pada tabel User berdasarkan id
        $data_admin = User::find($id);
        
        // kondisi jika input password tidak kosong
        if(!empty($request->password)) {
            // maka menampung array yang dibungkus varible yang berisi 
            // input name, input username, input password yang di enkripsi menggunakan Hash
            $input_admin = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            );
            
            // update data pada variabel $data_admin yang berisi table data user berdasarkan id
            $data_admin->update($input_admin);

            // jika kondisi diluar dari input password yang kosong atau input password kosong
        }else{

            // maka menampung array yang dibungkus varible yang berisi 
            // input name, input username, input password_value
            $input_admin = array(
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password_value
            );
            
            // update data pada variabel $data_admin yang berisi table data user berdasarkan id
            $data_admin->update($input_admin);
        }

        // mengalihkan pada halaman admin/
        return redirect('/admin/'.$id.'/edit');
    }

    public function destroy($id) {
        User::find($id)->delete();

        return redirect('/admin');
    }
    
}
