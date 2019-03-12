<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Coment;

class PolymorphicController extends Controller
{
    public function Polymorphic()
    {
        $city = City::where('name', 'Fortaleza')->get()->first();
        echo "<b>{$city->name}</b><br>";

        $comments = $city->comments()->get();

        foreach($comments as $comment){
            echo "{$comment->description}<hr>";
        };

    }

    public function PolymorphicInsert()
    {

        // Comentário sobre cidade ... 
        /*
        $city = City::where('name', 'Fortaleza')->get()->first();
        echo "<b>{$city->name}</b><br>";

        $coment = $city->comments()->create([
            'description' => "Aqui transa : {$city->name}".date('YmdHis'),
        ]);
        */

        // Comentario sobre estado ...
        $State = State::where('name', 'Ceara')->get()->first();
        echo "<b>{$State->name}</b><br>";

        $coment = $State->comments()->create([
            'description' => "Aqui transa em outro estado : {$State->name}".date('YmdHis'),
        ]);

        var_dump($coment->description);
    }
}
