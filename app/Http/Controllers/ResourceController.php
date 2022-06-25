<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreResourceRequest;
use App\Repositories\ResourceRepository;

class ResourceController extends Controller
{

    public function __construct()
    {
        $this->resources = new ResourceRepository();
    }

    public function index()
    {
        $resources = $this->resources->getSites();

        return view('resources.index', compact(['resources']));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(StoreResourceRequest $request)
    {
        $this->resources->createSites($request);
        return redirect()->route('resources.index');
    }

}
