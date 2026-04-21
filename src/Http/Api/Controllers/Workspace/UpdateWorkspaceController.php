<?php

namespace Inovector\MixpostEnterprise\Http\Api\Controllers\Workspace;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Inovector\MixpostEnterprise\Http\Api\Requests\Main\UpdateWorkspace;

class UpdateWorkspaceController extends Controller
{
    public function __invoke(UpdateWorkspace $updateWorkspace): JsonResponse
    {
        return response()->json([
            'success' => $updateWorkspace->handle(),
        ]);
    }
}
