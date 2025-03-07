<?php

namespace Inovector\MixpostEnterprise\Models;

use Inovector\Mixpost\Concerns\OwnedByWorkspace;
use Inovector\MixpostEnterprise\Facades\WorkspaceServiceManager;
use Inovector\Mixpost\Models\Service;

class WorkspaceService extends Service
{
    use OwnedByWorkspace;

    public $table = 'mixpost_e_workspace_services';

    protected static function booted(): void
    {
        static::saved(function ($service) {
            WorkspaceServiceManager::put(
                name: $service->name,
                configuration: $service->configuration->toArray(),
                active: $service->active
            );
        });

        static::deleted(function ($service) {
            WorkspaceServiceManager::forget($service->name);
        });
    }
}
