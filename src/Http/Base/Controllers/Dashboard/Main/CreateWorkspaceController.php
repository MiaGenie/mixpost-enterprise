<?php

namespace Inovector\MixpostEnterprise\Http\Base\Controllers\Dashboard\Main;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Inertia\Inertia;
use Inertia\Response;
use Inovector\MixpostEnterprise\Http\Base\Requests\Dashboard\Main\StoreWorkspace;
use Inovector\MixpostEnterprise\Util;


class CreateWorkspaceController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Dashboard/Main/CreateWorkspace', [
            'locales' => Util::config('locales')
        ]);
    }

    public function store(StoreWorkspace $storeWorkspace): RedirectResponse
    {
        $workspace = $storeWorkspace->handle();

        return redirect()->route('mixpost.dashboard', ['workspace' => $workspace->uuid]);
    }
}
