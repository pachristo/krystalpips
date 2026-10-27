<?php

namespace App\Http\Controllers;

use App\Models\AccountManagement;
use App\Models\Course;
use App\Models\InvPricing;
use App\Models\MenPricing;
use App\Models\Pricing;
use App\Models\ServicePage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $homepageQuery = \DB::table('homepages');
        if (\Schema::hasColumn('homepages', 'slug')) {
            $s = (clone $homepageQuery)->whereNull('slug')->first() ?? $homepageQuery->first();
        } else {
            $s = $homepageQuery->first();
        }
        return view('welcome',compact('s','blog','testimonial','trades'));
    }

    public function servicePage(string $key)
    {
        $page = ServicePage::where('key', $key)->firstOrFail();

        $map = [
            'signals' => [
                'packages' => Pricing::query()->orderBy('price')->get(),
                'paymentRoute' => 'sig.pricing',
            ],
            'mentorship' => [
                'packages' => MenPricing::query()->orderBy('price')->get(),
                'paymentRoute' => 'men.pricing',
            ],
            'investment' => [
                'packages' => InvPricing::query()->orderBy('price')->get(),
                'paymentRoute' => 'inv.pricing',
            ],
            'account-management' => [
                'packages' => AccountManagement::query()->orderBy('price')->get(),
                'paymentRoute' => 'acct.pricing',
            ],
            'courses' => [
                'packages' => Course::query()->orderBy('price')->get(),
                'paymentRoute' => 'courses.pricing',
            ],
        ];

        abort_unless(isset($map[$key]), 404);

        return view('pages.service', [
            'page' => $page,
            'packages' => $map[$key]['packages'],
            'paymentRoute' => $map[$key]['paymentRoute'],
        ]);
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
    $p=Course::find($id);
    if($p==null)abort(404);
    return view('pay',compact('p','name'));
}
}
