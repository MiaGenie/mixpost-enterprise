<?php

namespace Inovector\MixpostEnterprise\Http\Api\Controllers\Main;

use Illuminate\Routing\Controller;
use Inovector\Mixpost\Http\Base\Resources\WorkspaceResource;
use Inovector\MixpostEnterprise\Http\Api\Requests\Main\StoreWorkspace;

class StoreWorkspaceController extends Controller
{
    public function __invoke(StoreWorkspace $storeWorkspace): WorkspaceResource
    {
        return new WorkspaceResource(
            $storeWorkspace->handle()
        );
    }
}
