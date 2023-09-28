<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

use Illuminate\Support\Facades\DB;

class MemberController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function coinhistory(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];
        $data = DB::table('claimpoin')
        ->join('users', 'claimpoin.id_user', '=', 'users.id')
        ->where('id_user', '=', $user->id) 
        ->select('claimpoin.*', 'users.*', 'users.name as nama_user')
        ->get();

        return view('member/coinhistory', compact('active', 'data'));
    }
    public function rewardhistory(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];
        $result = DB::table('reward')
            ->join('users', 'reward.id_user', '=', 'users.id')
            ->select('reward.*', 'users.name as nama_user')
            ->where('admin_eksekutor', '=', $user->id)
            ->get();

        return view('member/rewardhistory', compact('active', 'result'));
    }
    public function myaccount(){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];

        return view('member/myaccount', compact('active'));
    }
    public function viewreward($value){
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        $active = [
            'dataUser' => $user,
        ];

        return view('member/viewreward', compact('active'));
    }
    //
}
