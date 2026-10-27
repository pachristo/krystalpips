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
        return $this->homepageView($this->liveHomepage());
    }

    public function sitemap()
    {
        $urls = [[
            'loc' => url('/'),
            'lastmod' => optional($this->liveHomepage())->updated_at,
        ]];

        foreach (ServicePage::query()->orderBy('id')->get(['key', 'updated_at']) as $service) {
            $urls[] = [
                'loc' => url('/'.$service->key),
                'lastmod' => $service->updated_at,
            ];
        }

        $pages = \App\Models\Homepage::query()
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->orderBy('id')
            ->get(['slug', 'updated_at']);
        foreach ($pages as $page) {
            $urls[] = [
                'loc' => url('/'.$page->slug),
                'lastmod' => $page->updated_at,
            ];
        }

        $urls[] = ['loc' => url('/blog'), 'lastmod' => null];
        $urls[] = ['loc' => url('/terms-and-conditions'), 'lastmod' => null];
        $urls[] = ['loc' => url('/privacy-policy'), 'lastmod' => null];

        foreach (\App\Models\Blog::query()->whereNotNull('slug')->where('slug', '!=', '')->orderByDesc('updated_at')->get(['slug', 'updated_at']) as $post) {
            $urls[] = [
                'loc' => url('/blog/'.$post->slug),
                'lastmod' => $post->updated_at,
            ];
        }

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');
        foreach ($urls as $item) {
            $url = $xml->addChild('url');
            $url->addChild('loc', htmlspecialchars($item['loc'], ENT_XML1));
            if (! empty($item['lastmod'])) {
                $url->addChild('lastmod', $item['lastmod']->toAtomString());
            }
        }

        return response($xml->asXML(), 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    public function seoPage(string $slug)
    {
        if (in_array($slug, ServicePage::keys(), true)) {
            return $this->servicePage($slug);
        }

        $page = \App\Models\Homepage::query()->where('slug', $slug)->first();
        if ($page === null) {
            abort(404);
        }

        return $this->homepageView($page);
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

    private function liveHomepage()
    {
        return \App\Models\Homepage::query()
            ->where(function ($query) {
                $query->whereNull('slug')->orWhere('slug', '');
            })
            ->orderBy('id')
            ->first()
            ?? \App\Models\Homepage::query()->orderBy('id')->first();
    }

    private function homepageView($s)
    {
        $trades = \App\Models\Trades::whereDate('date', '<=', \Carbon\Carbon::now()->format('d/m/Y'))->get();
        $testimonial = \App\Models\Testimonial::latest('created_at')->paginate(7);
        $blog = \App\Models\Blog::latest('created_at')->paginate(3);

        return view('welcome', compact('s', 'blog', 'testimonial', 'trades'));
    }

    public function invPayment($id, $name)
    {
        $p = InvPricing::find($id);
        if ($p == null) {
            abort(404);
        }

        return view('pay', compact('p', 'name'));
    }

    public function menPayment($id, $name)
    {
        $p = MenPricing::find($id);
        if ($p == null) {
            abort(404);
        }

        return view('pay', compact('p', 'name'));
    }

    public function sigPayment($id, $name)
    {
        $p = Pricing::find($id);
        if ($p == null) {
            abort(404);
        }

        return view('pay', compact('p', 'name'));
    }

    public function acctPayment($id, $name)
    {
        $p = AccountManagement::find($id);
        if ($p == null) {
            abort(404);
        }
        $asPercent = true;

        return view('pay', compact('p', 'name', 'asPercent'));
    }

    public function botPayment($id, $name)
    {
        $p = \App\Models\Bot::find($id);
        if ($p == null) {
            abort(404);
        }

        return view('pay', compact('p', 'name'));
    }

    public function cPayment($id, $name)
    {
        $p = Course::find($id);
        if ($p == null) {
            abort(404);
        }

        return view('pay', compact('p', 'name'));
    }
}
