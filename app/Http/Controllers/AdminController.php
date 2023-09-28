<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Log; 

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function userlist(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];
        return view('admin/userlist', compact('active'));
    }

    public function coinhistory(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];
        $admin_aksekutor = $user->name; // Replace with the actual admin_aksekutor value

        $data = DB::table('claimpoin')
        ->join('users', 'claimpoin.id_user', '=', 'users.id')
        ->where('admin_aksekutor', '=', $admin_aksekutor) // Replace with your desired admin value
        ->select('claimpoin.*', 'users.*', 'users.name as nama_user')
        ->get();

        return view('admin/coinhistory', compact('active', 'data'));
    }
    public function rewardStore(Request $request){
        try {
            $validatedData = $request->validate([
            'id_user' => 'required',
            'date_time' => 'required|date',
            'rincian_hadiah' => 'required',
            'total_poin' => 'required',
            
            // Add more validation rules for other fields as needed
            ]);

            if($request->total_poin != NULL){
                if($request->total_poin > $request->poinawal){
                    return redirect()->route('rewardhistory')->with('error', 'Poin Tidak Mencukupi');
                }else{
                    // The column is NULL in all matching rows
                $datatgl = Carbon::parse($request->input('date_time'))->format('Y-m-d H:i:s');
                $data = [
                    'id_user' => $request->id_user,
                    'admin_eksekutor' => $request->admin_aksekutor,
                    'total_poin' => $request->total_poin,
                    'rincian' => $request->rincian_hadiah,
                ];
                // print_r($data);
                // // Insert the data into the 'reward' table
                DB::table('reward')->insert($data);
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin - $request->total_poin")]);
            }
                 
            return redirect()->route('rewardhistory')->with('success', 'Data inserted successfully');
            }
            
            
        } catch (\Exception $e) {
            // Insertion failed, log the error (optional)
            Log::error('Error inserting data: ' . $e->getMessage());
            // Set an error message in the session
            return redirect()->route('rewardhistory')->with('error', 'Failed to insert data. Please try again.');
            
        }
    }
    public function coinStore(Request $request){
        try {
            $validatedData = $request->validate([
            'id_user' => 'required',
            'date_time' => 'required|date',
            
            // Add more validation rules for other fields as needed
            ]);

            if($request->total_poin != NULL){
                
                    // The column is NULL in all matching rows
                    $datatgl = Carbon::parse($request->input('date_time'))->format('Y-m-d H:i:s');
            DB::table('claimpoin')->insert([
                // echo ($request->feed);
                'id_user' => $request->id_user,
                'date_time' => $datatgl,
                'total_poin' => $request->total_poin,
                'admin_aksekutor' => $request->admin_aksekutor
            ]);
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin + $request->total_poin")]);
                 
            
            }

            // echo $request->feed;
            
            if($request->feed != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->feed)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 15,
                    'remark' => $request->feed,
                ]);  
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin + 15")]);
                 
                }
            }

            
            if($request->feed != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->feed)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 15,
                    'remark' => $request->feed,
                ]);  
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin + 15")]);
                 
                }
            }
            if($request->story1 != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->story1)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 5,
                    'remark' => $request->story1,
                ]);  
                }
                 
            }
            echo $request->story2;
            if($request->story2 != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->story2)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 5,
                    'remark' => $request->story2,
                ]);    
                echo $request->story2;
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin + 5")]);
                }
            }
            if($request->story3 != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->story3)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 5,
                    'remark' => $request->story3,
                ]);    
                DB::table('users')
                        ->where('id', $request->id_user)
                        ->update(['poin' => DB::raw("poin + 5")]);
                }
            }
            if($request->story4 != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->story4)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 5,
                    'remark' => $request->story4,
                ]);    
                }
            }
            if($request->story5 != NULL){
                $feedResult = DB::table('tb_poin_sosmed')
                ->where('id_user', $request->id_user)
                ->where('remark', $request->story5)
                ->first();
                
                if ($feedResult == NULL) {
                    // The column is NULL in all matching rows
                    DB::table('tb_poin_sosmed')->insert([
                    'id_user' => $request->id_user,
                    'total_poin' => 5,
                    'remark' => $request->story5,
                ]);
                }
            }
            
            return redirect()->route('coinhistory')->with('success', 'Data inserted successfully');
        } catch (\Exception $e) {
            // Insertion failed, log the error (optional)
            Log::error('Error inserting data: ' . $e->getMessage());
            // Set an error message in the session
            return redirect()->back()->with('error', 'Failed to insert data. Please try again.');
        }
        
        
     }
    public function rewardhistory(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];
        $admin_aksekutor = $user->name;
        $result = DB::table('reward')
            ->join('users', 'reward.id_user', '=', 'users.id')
            ->select('reward.*', 'users.name as nama_user')
            ->where('admin_eksekutor', '=', $admin_aksekutor)
            ->get();
            
        return view('admin/rewardhistory', compact('active', 'result'));
    }

    public function addData(Request $request){
        $users = User::all();
        $userId = auth()->id();
        $userlogin = User::find($userId);
        
        $validatedData = $request->validate([
            'qrcode' => 'required',
        ]);
        $qrdata = $request->qrcode;

        $user = DB::table('users')
            ->select('id', 'custom_id', 'name', 'email', 'no_telp', 'ig', 'poin', 'jenis_kelamin')
            ->where('custom_id', '=', $qrdata) // Replace with the email you're searching for
            ->first(); // Use first() to retrieve the first matching record

            $remarks = DB::table('tb_poin_sosmed')
            ->join('users', 'tb_poin_sosmed.id_user', '=', 'users.id')
            ->where('users.email', '=', $qrdata) // Replace 'your_email_here' with the email you want to filter by
            ->select('tb_poin_sosmed.remark as post', 'users.email as useridentiti')
            ->get()
            ->toArray();
        // print_r($remarks);
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
            return view('admin/addcoin', compact('active','profile', 'remarks'));

           
        } else {
            // User with the specified email not found
            echo 'data not found';
        }
    
    }
    public function addDataReward(Request $request){
        $users = User::all();
        $userId = auth()->id();
        $userlogin = User::find($userId);
        
        $validatedData = $request->validate([
            'qrcode' => 'required',
        ]);
        $qrdata = $request->qrcode;

        $user = DB::table('users')
            ->select('id','custom_id' ,'name', 'email', 'no_telp', 'ig', 'poin', 'jenis_kelamin')
            ->where('custom_id', '=', $qrdata) // Replace with the email you're searching for
            ->first(); // Use first() to retrieve the first matching record

            // $remarks = DB::table('tb_poin_sosmed')
            // ->join('users', 'tb_poin_sosmed.id_user', '=', 'users.id')
            // ->where('users.custom_id', '=', $qrdata) // Replace 'your_email_here' with the email you want to filter by
            // ->select('tb_poin_sosmed.remark as post', 'users.email as useridentiti')
            // ->get()
            // ->toArray();
        // print_r($remarks);
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
            return view('admin/addreward', compact('active','profile'));

           
        } else {
            // User with the specified email not found
            echo 'data not found';
        }
    
    }
    
}
