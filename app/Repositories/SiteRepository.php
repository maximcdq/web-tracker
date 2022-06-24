<?php
namespace App\Repositories;

use App\Models\Site;

class SiteRepository
{
    /**
     * @return mixed
     */

    public function createSites($site)
    {
        Site::create([
            'name' => $site->name,
            'url' => $site->url,
            'response_code' => $site->response_code,
            'user_id' => auth()->user()->id
        ]);
    }

    public function getSites()
    {
        return Site::where('user_id', '=', auth()->user()->id)->paginate(12);
    }
}
