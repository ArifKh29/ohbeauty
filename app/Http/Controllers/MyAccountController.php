<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userId = auth()->id();
        $userlogin = User::find($userId);
        
        $user = DB::table('users')
        ->select('id','custom_id' ,'name', 'email', 'no_telp', 'ig', 'poin', 'jenis_kelamin')
        ->where('id', '=', $userId) // Replace with the email you're searching for
        ->first(); // Use first() to retrieve the first matching record

        if ($user) {
            
            $active = [
                'dataUser' => $userlogin,
            ];
            $profile = [
                'id' => $user->id,
                'custom_id' => $user->custom_id,
                'name' => $user->name,
                'email' => $user->email,
                'noTelp' => $user->no_telp,
                'ig' => $user->ig,
                'poin' => $user->poin,
                'jenisKelamin' => $user->jenis_kelamin];


      
        // Access user data
        return view('myaccount', compact('active','profile')); // Anda harus membuat view "myaccount/index.blade.php" terlebih dahulu

       
    } else {
        // User with the specified email not found
        echo 'data not found';
    }
        
    }

    // Menyimpan perubahan profil pengguna
    public function editaccount()
    {
        $users = User::all();
        $userId = auth()->id();
        $userlogin = User::find($userId);
        
        $user = DB::table('users')
        ->select('id','custom_id' ,'name', 'email', 'no_telp', 'ig', 'poin', 'jenis_kelamin')
        ->where('id', '=', $userId) // Replace with the email you're searching for
        ->first(); // Use first() to retrieve the first matching record

        if ($user) {
            
            $active = [
                'dataUser' => $userlogin,
            ];
            $profile = [
                'id' => $user->id,
                'custom_id' => $user->custom_id,
                'name' => $user->name,
                'email' => $user->email,
                'noTelp' => $user->no_telp,
                'ig' => $user->ig,
                'poin' => $user->poin,
                'jenisKelamin' => $user->jenis_kelamin];


      
        // Access user data
        return view('editaccount', compact('active','profile')); // Anda harus membuat view "myaccount/index.blade.php" terlebih dahulu

       
    } else {
        // User with the specified email not found
        echo 'data not found';
    }
        // Validasi input dari form
        // $this->validate($request, [
        //     'nama' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'nohp' => 'required|string|max:20',
        //     'jenisKelamin' => 'required|in:Laki-laki,Perempuan',
        //     'akunig' => 'nullable|string|max:255',
        //     'password' => 'required', // Tambahkan validasi password
        // ]);

        // if (Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password])) {
        //     // Kata sandi cocok, izinkan pembaruan profil
        //     // Proses penyimpanan perubahan profil di sini
        //     // Misalnya, Anda dapat menggunakan model User untuk menyimpan data ke dalam tabel user.
        //     echo 'sandi cocok';
        //     // Redirect kembali ke halaman profil dengan pesan sukses
        //     // return redirect()->route('myaccount.index')->with('success', 'Profil Anda berhasil diperbarui.');
        // } else {
        //     // Kata sandi tidak cocok, tampilkan pesan error
        //     echo 'sandi error';
        //     // return redirect()->back()->withErrors(['password' => 'Kata sandi verifikasi tidak benar.'])->withInput();
        // }
    

        // Proses penyimpanan perubahan profil di sini
        // Misalnya, Anda dapat menggunakan model User untuk menyimpan data ke dalam tabel user.

        // Redirect kembali ke halaman profil dengan pesan sukses
        // return redirect()->route('myaccount.index')->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function store(){

    }
    public function verifyPassword(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'password' => 'required',
    ]);

    // Memeriksa apakah kata sandi yang dimasukkan benar
    if (Hash::check($request->password, Auth::user()->password)) {
        // Kata sandi cocok, lanjutkan ke halaman edit profil
        return redirect()->route('myaccount.edit');
    } else {
        // Kata sandi tidak cocok, kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->withErrors(['password' => 'Kata sandi verifikasi tidak benar.']);
    }
}
}
