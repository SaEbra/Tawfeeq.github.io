<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;


class FirebaseController extends Controller
{
    //
    public function index(){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/tawfeeq-89382-firebase-adminsdk-nmr5x-45c6005207.json');
        
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
            $db = $firebase->getDatabase();
            /*
            $db->getReference('config/website')->set([
                'name' => 'EbrahimLaravel',
                'emails' => 'EbrahimLaravel@gmail.com',
                'Id'=>10
            ]);
            */
            $getData = $db->getReference('config/website')->getValue();
            echo "<pre>";
            print_r($getData);
            echo "</pre>";
            //return view('welcome');
    }
    public function trysms(){
        return view('TrySms');

    }
}
