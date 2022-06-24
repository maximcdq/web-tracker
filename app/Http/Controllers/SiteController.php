<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreSiteRequest;
use App\Repositories\SiteRepository;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->sites = new SiteRepository();
    }

    public function index()
    {
        $sites = $this->sites->getSites();
        return view('sites.index', compact(['sites']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSiteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSiteRequest $request)
    {
        $this->sites->createSites($request);
        return redirect()->route('sites.index');
    }

}
