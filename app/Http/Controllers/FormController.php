<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uzklausos;

class FormController extends Controller
{
    public function show($id)
    {
        $form = uzklausos::where('puslapis', $id)->firstOrFail();
        $tempString = explode('//', $form->uzklausa);
        $countries = [];
        $moreInfo = [];
        foreach ($tempString as $key => $element) {
            if ($key == 0) {
                $countries = explode(' - ', $element)[1];
            } else {
                $tempInfo = explode(',', $element);
            }
        }
        foreach ($tempInfo as $key => $infoPart) {
            if ($key % 2 == 0) {
                $moreInfo[$infoPart] = $tempInfo[$key + 1];
            }
        }

        return view('Forms.show', [
            'form' => $form,
            'countries' => $countries ?  : ' - ',
            'moreInfo' => $moreInfo ?  : [' - ']
        ]);
    }
}
