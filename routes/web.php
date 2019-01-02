<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 

Route::get('/', function () {
    return view('index');
}); 
Route::get('/index',  'IndexController@index');

Route::post('/language', array(
    'before' =>'csrf',
    'as'=>'language-chooser',
    'uses'=>'LanguageController@changeLanguage',
    ) 
); 

Route::post('/registerPhone',  'RegisterController@index');

Route::get('/AdminLogin',  'AdminController@showLogin');
Route::post('/login',  'AdminController@login');

Route::get('/ourGoals',  'AdminController@showOurGoals');
Route::post('/ourGoals',  'AdminController@saveOurGoals');

Route::get('/whoAreWe',  'AdminController@showWhoAreWe');
Route::post('/whoAreWe',  'AdminController@saveWhoAreWe');

Route::get('/warnings',  'AdminController@showWarnings');
Route::post('/warnings',  'AdminController@saveWarnings');

Route::get('/howItWorks',  'AdminController@showHowItWorks');
Route::post('/howItWorks',  'AdminController@saveHowItWorks');

Route::get('/payData',  'AdminController@showPayData');
Route::post('/payData',  'AdminController@savePayData');








//Route::get('/personalQuestions', 'MemberController@showPersonalQuestions')->middleware('CheckSesison');

//Route::post('/register',  'RegisterController@register');

Route::group(['middleware' => ['CheckSesison']], function () {

    Route::get('/register',  'RegisterController@register');
    Route::get('/matchList',  'MemberController@matchList');

    Route::post('/saveMember', 'RegisterController@save');
    Route::post('/getCities', 'RegisterController@getCities');
    Route::get('/matchList',  'MemberController@matchList');

    Route::get('/generalQuestions',  'MemberController@showGeneralQuestions');
    Route::post('/saveGeneralQuestions',  'MemberController@saveGeneralQuestions');
    Route::get('/saveGeneralQuestions',  'MemberController@saveGeneralQuestions');
    Route::get('/profilePhoto',  'MemberController@ShowProfilePhoto');

    Route::get('/personalQuestions',  'MemberController@showPersonalQuestions');
    Route::post('/savePersonalQuestions',  'MemberController@savePersonalQuestions');

    Route::get('/partnerQuestions',  'MemberController@showPartnerQuestions');
    Route::post('/savePartnerQuestions',  'MemberController@savePartnerQuestions');

    Route::post('/interestedIn',  'MemberController@saveInterestedIn');
    Route::get('/interestedInMe',  'MemberController@showInterestedInMe');

    Route::get('/showProfile/ID/{ID}', 'MemberController@showProfile');

    Route::get('/servicingStop',  'MemberController@showServicingStop');
    Route::post('/servicingStop',  'MemberController@saveServicingStop');

    Route::get('/paymentNotification',  'MemberController@showPaymentNotification');
    Route::post('/paymentNotification',  'MemberController@savePaymentNotification');



    Route::get('/chatHistory', 'MemberController@getChatHistory');
    Route::get('/chatdetails', 'MemberController@getChatdetails');
    


    
    
});

Route::get('/logout',  'IndexController@logout');    


 
/*
Route::post('/getHome',  'RegisterController@index');


Route::get('/try', function () {
    return view('try');
}); 
Route::get('/home', 'HomeController@index')->name('home');
*/

 


