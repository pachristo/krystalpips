<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
$set = \DB::table('settings')->first();
\View::share([
    'twitterlink' => $set->twitter ?? '',
    'facebooklink' => $set->facebook ?? '',
    'instagramlink' => $set->instagram ?? '',
    'youtubelink' => $set->youtube ?? '',
    'telegramlink' => $set->telegram ?? '',
    'emaillink' => $set->email ?? '',
    'freesignallink' => $set->free_signal ?? ($set->telegram ?? ''),
    'phone' => $set->phone ?? '',
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

Route::get('investment', fn () => app(HomeController::class)->servicePage('investment'));
Route::get('signals', fn () => app(HomeController::class)->servicePage('signals'));
Route::get('mentorship', fn () => app(HomeController::class)->servicePage('mentorship'));
Route::get('courses', fn () => app(HomeController::class)->servicePage('courses'));
Route::get('account-management', fn () => app(HomeController::class)->servicePage('account-management'));

Route::get('bot', function () {
    return view('bot');
})->middleware('auth');

Route::get('profile', function () {
    return view('dashboard.profile');
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
