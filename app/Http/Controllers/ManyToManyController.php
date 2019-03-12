<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::where('name', 'Fortaleza')->get()->first();
        echo "<b>{$city->name}</b><br>";

        $companies = $city->companies;
        foreach($companies as $company){
            echo " {$company->name} ";
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::where('name', 'Mikromundo')->get()->first();
        echo "<b>{$company->name}</b><br>";

        $cities = $company->cities;
        foreach($cities as $city){
            echo " {$city->name} ";
        }

    }

    public function manyToManyInsert()
    {
        //Pegou as cidades
        $dataForm = [3,4,5];

        //Pegou a empresa
        $company = Company::find(1);
        echo "<b>{$company->name}</b><br>";

        //Vincula as cidades, sempre adicionando mais
        // $company->cities()->attach($dataForm);

        // Remover vinculos
        //$company->cities()detach();

        //Vinculou as cidades a empresa 1
        $company->cities()->sync($dataForm);

        $cities = $company->cities;
        foreach($cities as $city){
            echo " {$city->name} ";
        }
    }
}
