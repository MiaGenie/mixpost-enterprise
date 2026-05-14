<?php

namespace Inovector\MixpostEnterprise\Http\Api\Controllers\Main;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Inovector\Mixpost\Http\Base\Resources\WorkspaceResource;

class AllWorkspacesController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return WorkspaceResource::collection(
            Auth::user()
                ->workspaces()
                ->with('owner')
                ->get()
        );
    }
}
