<?php

namespace Inovector\MixpostEnterprise\Http\Api\Controllers\Workspace;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inovector\Mixpost\Facades\WorkspaceManager;
use Inovector\MixpostEnterprise\Http\Api\Requests\Main\StoreWorkspace;

class DeleteWorkspaceController extends Controller
{
    public function __invoke(StoreWorkspace $storeWorkspace): JsonResponse
    {
        return response()->json([
            'success' => WorkspaceManager::current()?->delete(),
        ]);
    }
}
