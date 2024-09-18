<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades=\App\Models\Trades::whereDate('date','<=',\Carbon\Carbon::now()->format('d/m/Y'))->get();
        $testimonial=\App\Models\Testimonial::latest('created_at')->paginate(7);
        $blog=\App\Models\Blog::latest('created_at')->paginate(3);
        $s = \DB::table('homepages')->first();
        return view('welcome',compact('s','blog','testimonial','trades'));
    }

//     Route::get('payment/investment/{id}/{name}', [HomeController::class,'invPayment'])->name('inv.price')->middleware('auth');
// Route::get('payment/mentorship/{id}/{name}', [HomeController::class,'MenPayment'])->name('men.price')->middleware('auth');
// Route::get('payment/signal/{id}/{name}', [HomeController::class,'sigPayment'])->name('sig.price')->middleware('auth');
// Route::get('payment/account-management/{id}/{name}', [HomeController::class,'acctPayment'])->name('acct.price')->middleware('auth');
// Route::get('payment/courses/{id}/{name}', [HomeController::class,'cPayment'])->name('c.price')->middleware('auth');


// Route::get('payment/courses/{id}/{name}', [HomeController::class,'botPayment'])->name('bot.price')->middleware('auth');

public function invPayment($id,$name){
     $p=\App\Models\InvPricing::find($id);
     if($p==null)abort(404);
     return view('pay',compact('p','name'));


}

public function menPayment($id,$name){
    $p=\App\Models\MenPricing::find($id);
    if($p==null)abort(404);
    return view('pay',compact('p','name'));


}
public function sigPayment($id,$name){
    $p=\App\Models\Pricing::find($id);
    if($p==null)abort(404);
    return view('pay',compact('p','name'));


}
public function acctPayment($id,$name){
    $p=\App\Models\AccountManagement::find($id);
    if($p==null)abort(404);
    return view('pay',compact('p','name'));


}
public function botPayment($id,$name){
    $p=\App\Models\Bot::find($id);
    if($p==null)abort(code: 404);
    return view('pay',compact('p','name'));


}

public function cPayment($id,$name){
    $p=\App\Models\Bot::find($id);
    if($p==null)abort(code: 404);
    return view('pay',compact('p','name'));


}
}
