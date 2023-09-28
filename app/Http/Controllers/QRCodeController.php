<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use App\Models\User; 

class QRCodeController extends Controller
{
    public function generateQRCode()
    {
        // Data you want to encode in the QR code
        $users = User::all();
        $userId = auth()->id();
        $user = User::find($userId);
        
        $active = [
            'dataUser' => $user,
        ];
        return view('member/yourqr', compact('active'));
    }
}
