<?php

namespace App\Http\Controllers\Api;

use App\Models\Guest;
use App\Mail\GuestContact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class GuestController extends Controller
{
    public function store(Request $request){
        $form_data = $request->all(); // Qua andiamo a recuperare i dati del form fatti in front-end
        
        $validator = Validator::make($form_data, [     // quan andiamo a validarli
            'name'  => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if($validator->fails()){  // se fallisce il validator vado negli errori e li mostro a schermo
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $newContact = new Guest(); // se va tutto bene vengono inviati nel DB
        $newContact->fill($form_data);
        $newContact->save();

        Mail::to('info@boolpres.com')->send(new GuestContact($newContact));

        return response()->json([
            'success' => true
        ]);



    }
}
