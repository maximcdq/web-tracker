<?php

namespace App\Console\Commands;

use App\Mail\StatusNotification;
use App\Repositories\ResourceRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class checkResourceStatuses extends Command
{
    protected $signature = 'checkResourceStatuses';
    protected $description = 'The command sends a message about changing the status of a resource';

    private $resourceRepository;

    public function __construct()
    {
        parent::__construct();
        $this->resourceRepository = new ResourceRepository();
    }

    public function handle()
    {
        $modifyResources = $this->resourceRepository->getModifyResources();

        if (!empty($modifyResources)) {
            foreach ($modifyResources as $modifyResource) {
                Mail::to($modifyResource['email'])->send(new StatusNotification($modifyResource));
            }
        }
    }
}
