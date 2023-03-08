<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use App\Models\Country;
use GuzzleHttp\Client;
use App\Http\Controllers\CountryController;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $api = new Client();
        $response = $api->get('https://restcountries.com/v3.1/region/South%20America');
        $data = $response->getBody()->getContents();
        $paises = json_decode($data);
        foreach ($paises as $pais) {
        Country::create([
            'country_name' => $pais->name->common,
        ]);
        }
        $categorys = ['Cliente','Proovedor','Funcionamiento Interno'];
        foreach ($categorys as $category) {
        Categories::create([
            'category_name' => $category,
            
        ]);
        }
        
    }

}
