<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;

class oneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::find(1);

        echo $country->name;

        $location = $country->location;

        echo "<hr>Latitude: {$location->latitude}<br>";
        echo "Longitude: {$location->longitude}<br>";
    }

    public function oneToOneInverse()
    {
        $latitude = 123;
        $longitude = 321;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude)
                                ->get()
                                ->first();

        $country = $location->country()->get()->first();

        echo $country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name'      => 'Suica',
            'latitude'  => '333',
            'longitude' => '444',
        ];

        $country = Country::create($dataForm);

        /* - Primeira opção de insert
        $dataForm['country_id'] = $country->id;
        $location = Location::create($dataForm);
        */

        // or

        /* - Segunda opção de insert
        $location = new Location;
        $location->latitude = $dataForm['latitude'];
        $location->longitude = $dataForm['longitude'];
        $location->country_id = $country->id;
        $saveLocation = $location->Save();
        */

        // or

        // - Terceira opção de insert
        $location = $country->location()->create($dataForm);
    }
}
