<?php
namespace App\Http\Controllers;

use App\Models\Kontestan;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        // Get the logged-in participant's ID from session
        $peserta_id = session('peserta_id');

        // Get the list of contestants
        $kontestans = Kontestan::all();

        // Check if the current participant has already rated a contestant
        // Filter out the contestants already rated by the logged-in participant
        $kontestansToDisplay = $kontestans->filter(function ($kontestan) use ($peserta_id) {
            return !Penilaian::where('peserta_id', $peserta_id)
                             ->where('kontestan_id', $kontestan->id)
                             ->exists();
        });

        // Pass the filtered list of contestants to the view
        return view('form', compact('kontestansToDisplay'));
    }

    public function storeScore(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'kontestan_id' => 'required|exists:kontestans,id',
            'skor' => 'required|integer',
        ]);

        // Save the score to the Penilaian table
        $penilaian = new Penilaian();
        $penilaian->peserta_id = session('peserta_id');
        $penilaian->kontestan_id = $request->kontestan_id;
        $penilaian->skor = $request->skor;
        $penilaian->save();

        // Redirect to the form with a success message
        return redirect()->route('form')->with('success', 'Score saved successfully!');
    }
}
