<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});
Route::get('/healthz', function () {
    return response()->json(['status' => 'OK'], 200);
});

Route::resource('users',UserController::class);
Route::resource('postes',PosteController::class);

// Route::prefix("users")->group(function(){
//     Route::controller(UserController::class)->group(function(){

//         Route::get("/","index")->name("index");
        
        
//         Route::get("/create","create")->name("create");
        
//         Route::post("/","store")->name("store");
        
        
//         Route::get("/{user}/edit","edit")->name("edit");
        
//         Route::put("/{user}","update")->name("update");
        
        
//         Route::get("/{user}","show")->name("show");
        
//         Route::delete("/{user}","destroy")->name("destroy");
//     });
// });

Route::prefix("user")->group(function(){
    Route::controller(NewController::class)->group(function(){
        
        Route::get("/log-in","login")->name("login");
        
        Route::post("/","auth")->name("auth");
        
        Route::get("/log-out","logout")->name("logout");
    });
});

Route::get('/api/users', [NewController::class, 'getUsers']);

/*
Route::view('/2', 'welcome')->name("welcome")->middleware("admin");

Route::get('/page1/{firstName}/{lastName}', function (request $request) {
    $nom= $request->lastName;
    $prenom= $request->firstName;
   return view('page',[
        "nom"=>$nom,
        "prenom"=>$prenom,
        "Module"=>["php","js","python"]    
    ]);
})->name("page");

Route::view('/page2', 'page');

Route::get("/page3/{firstName}/{lastName}",
"index"]); */


Route::view('/test','test');

Route::get('/route/{x?}',function($x=0){
if ($x!=0) {
    return $x;
}
else{
    return "param facultatif";
}
//Route::current() :actual route
//Route::currentRouteAction() :actual route methode
//Route::currentRouteName() :actual route name
});
Route::get("/google",function(){
return redirect()->away("https://www.google.com");
});


Route::view("/form","test");
        
Route::post("/",function (Request $request){
    dd($request->post());
    dd($request->string('name'));
    dd($request->input('password'));
    dd($request->date('date'));
})->name("test");

Route::get("/say",function(){
    // return "Hello";
    // return new Response("Hello",200,[]); // create a response
    // return response()->download("images/person-1.jpeg",'',[],'inline');// download file
    // return response()->download("images/person-1.jpeg",disposition:'inline'); //show file
    return response()->file("images/person-1.jpeg",[]);// show file

});
Route::get('/cookie/get',function(Request $request){
    dd($request->cookie("age")); //get vlaue of cookie
});
Route::get('/cookie/set/{value}',function($value){
    $response=new Response();// create a response
    $cookie=cookie("age",$value,5); // initial a cookie
    // $cookie=cookie()->forever("age",$value,5); // time +1 Year
    return $response->withCookie($cookie);// create a cookie : inspect => application => cookies
});
Route::get('/headers',function(){
    $response=new Response();
    return $response->withHeaders([
        'Content-type'=>"aplication/json",
        'X-Mohcine'=>"khiyiata"
    ]);
});
Route::get('/request',function(Request $request){
    // dd($request->url());// url
    // dd($request->fullUrl());// url + query params
    // dd($request->method());//get
    // dd($request->is());//chek is true | false
    // dd($request->path()); //after host
    dd($request->host()); //host
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
