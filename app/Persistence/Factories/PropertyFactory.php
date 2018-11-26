<?php

namespace App\Persistence\Factories;


use App\Models\Property;

class PropertyFactory
{

    public function createFromRequest(array $data) {
        $property = new Property();

        $property->name = $data['name'];
        $property->type = $data['type'];

        $data['type'] == "TEXT" ?  $property->text_value = $data['text'] : $property->text_value = null;
        $data['type'] == "NUMBER" ?  $property->number_value = $data['number'] : $property->number_value = null;
        $data['type'] == "BOOLEAN" ?  $property->boolean_value = $data['boolean'] : $property->boolean_value = null;

        return $property;
    }
}