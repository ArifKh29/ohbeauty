<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        // allpoinmaster
        $totalPoin = DB::table('claimpoin')
            ->select(DB::raw('SUM(total_poin) as total'))
            ->first(); // Menggunakan first() karena Anda hanya ingin satu hasil

        // allrewardmaster
        $totalReward = DB::table('reward')
            ->select(DB::raw('SUM(total_poin) as totalreward'))
            ->first(); 

        $totalPoinPrizeshop = DB::table('claimpoin')
        ->select(DB::raw('SUM(total_poin) as total', 'admin_aksekutor'))
        ->where('admin_aksekutor', $user->name )
        ->first(); // Menggunakan first() karena Anda hanya ingin satu hasil

        $totalRewardPrizeshop = DB::table('reward')
        ->select(DB::raw('SUM(total_poin) as totalreward', 'admin_eksekutor' ))
        ->where('admin_eksekutor', $user->name )
        ->first();

        $active = [
            'dataUser' => $user,
            'poinadmin' => $totalPoin->total,
            'rewardadmin' => $totalReward->totalreward,
            'rewardprizeshop' => $totalRewardPrizeshop->totalreward,
            'poinprizeshop' => $totalPoinPrizeshop->total

        ];
        $trx = DB::table('users')
            ->select('users.custom_id', 'claimpoin.id_claimpoin', 'users.name', 'claimpoin.total_poin AS poin', 'claimpoin.date_time AS tanggal', 'claimpoin.admin_aksekutor AS admin_eksekutor', DB::raw("'claimpoin' AS jenis_data"))
            ->join('claimpoin', 'users.id', '=', 'claimpoin.id_user')
            ->where('claimpoin.admin_aksekutor', $user->name )
            ->unionAll(
                DB::table('users')
                    ->select('users.custom_id', 'reward.id_reward', 'users.name', 'reward.total_poin AS poin', 'reward.date_time AS tanggal', 'reward.admin_eksekutor', DB::raw("'reward' AS jenis_data"))
                    ->join('reward', 'users.id', '=', 'reward.id_user')
                    ->where('reward.admin_eksekutor', $user->name )
            )
            ->orderBy('tanggal', 'desc')
            ->get();
        $dtmember = DB::table('users')
            ->select('users.custom_id', 'claimpoin.id_claimpoin','users.name', 'claimpoin.total_poin AS poin', 'claimpoin.date_time AS tanggal', 'claimpoin.admin_aksekutor AS admin_eksekutor', DB::raw("'claimpoin' AS jenis_data"))
            ->join('claimpoin', 'users.id', '=', 'claimpoin.id_user')
            ->where('claimpoin.id_user', $user->id )
            ->unionAll(
                DB::table('users')
                    ->select('users.custom_id', 'reward.id_reward', 'users.name', 'reward.total_poin AS poin', 'reward.date_time AS tanggal', 'reward.admin_eksekutor', DB::raw("'reward' AS jenis_data"))
                    ->join('reward', 'users.id', '=', 'reward.id_user')
                    ->where('reward.id_user', $user->id )
            )
            ->orderBy('tanggal', 'desc')
            ->get();
        $dtmaster = DB::table('users')
            ->select('users.custom_id', 'claimpoin.id_claimpoin as id_reward','users.name', 'claimpoin.total_poin AS poin', 'claimpoin.date_time AS tanggal', 'claimpoin.admin_aksekutor AS admin_eksekutor', DB::raw("'claimpoin' AS jenis_data"))
            ->join('claimpoin', 'users.id', '=', 'claimpoin.id_user')
            ->unionAll(
                DB::table('users')
                    ->select('users.custom_id', 'reward.id_reward as id_reward', 'users.name', 'reward.total_poin AS poin', 'reward.date_time AS tanggal', 'reward.admin_eksekutor', DB::raw("'reward' AS jenis_data"))
                    ->join('reward', 'users.id', '=', 'reward.id_user')    
            )
            ->orderBy('tanggal', 'desc')
            ->get();

       
        return view('home', compact('active', 'trx', 'dtmember', 'dtmaster'));
    }
}
