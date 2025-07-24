<?php
namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'qr_hash' => 'required|string',
        ]);

        $peserta = Peserta::where('email', $request->email)
                          ->where('qr_hash', $request->qr_hash)
                          ->first();

        if (!$peserta) {
            return redirect()->back()->withErrors(['msg' => 'Invalid email or QR hash.']);
        }

        // Store peserta id in session for later use
        session(['peserta_id' => $peserta->id]);

        return redirect()->route('form');
    }
}
