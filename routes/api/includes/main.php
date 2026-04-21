<?php

use Illuminate\Support\Facades\Route;

use Inovector\MixpostEnterprise\Http\Api\Controllers\Main\AllWorkspacesController;
use Inovector\MixpostEnterprise\Http\Api\Controllers\Main\StoreWorkspaceController;
use Inovector\MixpostEnterprise\Http\Base\Middleware\AllowMultipleWorkspaces;

Route::get('workspaces', AllWorkspacesController::class)->name('workspaces');
Route::post('workspaces/store', StoreWorkspaceController::class)->name('workspace.store')->middleware(AllowMultipleWorkspaces::class);
