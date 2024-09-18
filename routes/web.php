<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
$set=\DB::table('settings')->first();
\View::share([
'twitterlink' =>$set->twitter,
'facebooklink' =>$set->facebook,
'instagramlink' =>$set->instagram,
// 'linkedin' =>$set->linkedin,
'youtubelink' =>$set->youtube,
'phone' =>$set->phone,
]);
Route::get('/',[HomeController::class,'index']);

// Route::get('/services', )
Route::get('/login', function () {
    return view('login');
}
)->name('login');



Route::get('/register', function () {
    return view('register');
}
)->name('register');
;



Route::get('/forget-password', function () {
    return view('reset');
}
)->name('forgot-password');
;

Route::get('/terms-and-conditions', function(){
return view('terms');
})->name('terms');
Route::get('privacy-policy', function(){
return view('policy');

})->name('policy');
Route::get('/dashboard', function () {
return view('dashboard.index');


})->name('dashboard')->middleware('auth');

Route::get('investment',function(){
    // return redirect('/dashboard');
    return view('investment');
})->middleware('auth');

Route::get('signals',function(){
    // return redirect('/dashboard');
    return view('signal');
})->middleware('auth');
Route::get('mentorship',function(){
   return view('mentorship');
//    return redirect('/dashboard');
})->middleware('auth');


Route::get('bot',function(){
    return view('bot');
 //    return redirect('/dashboard');
 })->middleware('auth');


//  courses
Route::get('courses',function(){
    return view('courses');
 //    return redirect('/dashboard');
 })->middleware('auth');

Route::get('account-management',function(){
    return view('acct');
 //    return redirect('/dashboard');
 })->middleware('auth');
Route::get('profile',function(){
    return view('dashboard.profile');
 //    return redirect('/dashboard');
 })->middleware('auth');

Route::get('blog',function(){
    // return redirect('/dashboard');
    return view('blog');
});
Route::get('blog/{slug}', function($slug){
 $blog =\App\Models\Blog::where('slug',$slug)->first();
 return view('single-blog',compact('blog'));

});


Route::get('payment/investment/{id}/{name}', [HomeController::class,'invPayment'])->name('inv.pricing')->middleware('auth');
Route::get('payment/mentorship/{id}/{name}', [HomeController::class,'MenPayment'])->name('men.pricing')->middleware('auth');
Route::get('payment/signal/{id}/{name}', [HomeController::class,'sigPayment'])->name('sig.pricing')->middleware('auth');
Route::get('payment/account-management/{id}/{name}', [HomeController::class,'acctPayment'])->name('acct.pricing')->middleware('auth');
Route::get('payment/courses/{id}/{name}', [HomeController::class,'cPayment'])->name('courses.pricing')->middleware('auth');


Route::get('payment/bot/{id}/{name}', [HomeController::class,'botPayment'])->name('bot.pricing')->middleware('auth');
