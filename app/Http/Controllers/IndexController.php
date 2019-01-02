<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public $serviceAccount;
    public $firebase;
    public $db;

    public function __construct()
    {
        $this->serviceAccount = ServiceAccount::fromJsonFile("../secret/tawfeeq-zawaj-d08b2478bb96.json");
        $this->firebase = (new Factory)->withServiceAccount($this->serviceAccount)->create();
        $this->db = $this->firebase->getDatabase();
    }

    public function index()
    {
        return view('index');
        
    }
   

    public function logout(Request $request)
    {
        //$request->session()->forget('phoneNumber');
        echo "<script type=\"text/javascript\">firebase.auth().signOut(); </script> ";
        $request->session()->flush();
        //return view('index');
        return redirect('/');
    }
    
}
