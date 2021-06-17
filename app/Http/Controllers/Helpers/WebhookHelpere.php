<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paperform;
use App\Models\uzklausos;

class WebhookHelpere
{
    public static function catchWebhook()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Получаем данные с твоего хука
            $json = file_get_contents('php://input');

            // декодируем json
            $object = json_decode($json);

            // комната ожидания валидного json
            if (json_last_error() !== JSON_ERROR_NONE) {
                die(header('HTTP/1.0 415 Unsupported Media Type'));
            }


            self::insertData($object);

        }
    }

    private static function insertData($data)
    {
        $tempData = [];
        foreach ($data->data as $key => $element) {
            if ($key >= 4) {
                $tempData[] = ["title" => $element->title, "value" => $element->value];
            }


        }
        //$city =array_shift($tempData);
        foreach ($tempData as $key => $array) {

            if ($key == 0) {
                $cityInfo = $array['title'] . ' - ' . implode(',', $array['value']);
            } else {
                $moreInfo[] = implode(',', $array);
            }
        }

        $name = $cityInfo . '//' . implode(',', $moreInfo);


        $paperform = new Paperform;

        $paperform->pavadinimas = $data->slug;
        $paperform->url = $data->data[3]->value;
        $paperform->paperform_code = $data->form_id;
        $paperform->puslapis = $data->submission_id;
        $paperform->vardas = $data->data[0]->value;
        $paperform->tel = $data->data[1]->value;
        $paperform->el_pastas = $data->data[2]->value;
        $paperform->uzklausa = $name;
        $paperform->save();

        $uzklausos = new uzklausos;


        $uzklausos->puslapis = $data->submission_id;
        $uzklausos->vardas = $data->data[0]->value;
        $uzklausos->tel = $data->data[1]->value;
        $uzklausos->el_pastas = $data->data[2]->value;
        $uzklausos->uzklausa = $name;
        $uzklausos->save();
    }

}
