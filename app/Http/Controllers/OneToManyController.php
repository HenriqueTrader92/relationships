<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
        // $country = Country::where('name', 'Brasil')->get()->first();
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get(); 

        foreach($countries as $country){

            echo "<b>{$country->name}</b>";

            $states = $country->states; // Lembrar de depois usar o 'with()' na primeira consulta

            foreach($states as $state){
                echo"<br>{$state->initials} - {$state->name}";
            }

            echo '<hr>';
        }
    }

    public function manyToOne()
    {
        $stateName = 'Ceara';
        $state = State::where('name', $stateName)->get()->first();

        echo "<b>$state->name</b>";

        $country = $state->country;
        echo "<br>Pais: {$country->name}";
    }

    public function oneToManyTwo()
    {
        // $country = Country::where('name', 'Brasil')->get()->first();
        $keySearch = 'a';
        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->get(); 

        foreach($countries as $country){

            echo "<b>{$country->name}</b>";

            $states = $country->states; // Lembrar de depois usar o 'with()' na primeira consulta

            foreach($states as $state){
                echo"<br>{$state->initials} - {$state->name}:";

                foreach($state->cities as $city){
                    echo" {$city->name}, ";
                }
            }

            echo '<hr>';
        }
    }

    /* Primeira opção de INSERT UM para MUITOS
    public function oneToManyInsert()
    {
        $dataForm = [
            'name'      => 'Bahia',
            'initials'  => 'BA',
        ];

        $country = Country::find(1);

        $insertState = $country->states()->create($dataForm);

        dd($insertState->name);
    }
    */

    public function oneToManyInsertTwo()
    {
        $dataForm = [
            'name'      => 'Acre',
            'initials'  => 'AC',
            'country_id'=> '1',
        ];

        $insertState = State::create($dataForm);

        dd($insertState->name);
    }

    public function hasManyThrough()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}:</b> <br>";

        $cities = $country->cities;

        foreach($cities as $city){
            echo " {$city->name},";
        }

        echo "<br>Total Cidades: {$cities->count()}";
    }
}
