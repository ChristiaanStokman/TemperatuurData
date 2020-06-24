<?php                                                                                                // TemperatuurController.php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Dagmeting;
use Illuminate\Http\Request;
use App\Maanden;
use App\Nieuwsbrief;
use Illuminate\Support\Facades\Validator;

class TemperatuurController extends Controller
{
    public function index(Request $request)
    {
        $maand = $request->input('maand');
        $metingen = Dagmeting::where('maandnr', $maand)->orderBy('dagnr', 'asc')->get();
        return view('selecteer', array('maand'=>$maand, 'metingen'=>$metingen, 'maandnamen'=>Maanden::namen()));
    }

    public function detail(Request $request)
    {
        $request->validate([
            'maand' => 'required|integer|min:1|max:12'
        ]);
        $maand = $request->input('maand');
        $metingen = Dagmeting::where('maandnr', $maand)->orderBy('dagnr', 'asc')->get();
        return view('overzicht', array('maand'=>$maand, 'metingen'=>$metingen, 'maandnamen'=>Maanden::namen()));
    }

    public function contact()
    {
        return view('contact');
    }

    public function nieuwsbrief(Request $request)
    {
        $request->validate([
            'emailadres' => 'required|email'
        ]);
        if($validator->fails())
        {
            Log::error ('validatie fout: ', $request->all());
            return redirect('/');
        }
        $nieuwsbrief = new Nieuwsbrief();
        $nieuwsbrief->mailadres = $request->input('emailadres');
        $nieuwsbrief->save();
        return view('bedankt');
    }
}