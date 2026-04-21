<?php

use Illuminate\Support\Facades\Route;
use Inovector\Mixpost\Enums\WorkspaceUserRole;
use Inovector\Mixpost\Http\Base\Middleware\CheckWorkspaceUser;
use Inovector\Mixpost\Http\Base\Middleware\IdentifyWorkspace;
use Inovector\Mixpost\Mixpost;
use Inovector\MixpostEnterprise\Http\Api\Controllers\Workspace\DeleteWorkspaceController;
use Inovector\MixpostEnterprise\Http\Api\Controllers\Workspace\UpdateWorkspaceController;

Route::middleware(array_merge([
    IdentifyWorkspace::class,
    CheckWorkspaceUser::class . ':' . WorkspaceUserRole::ADMIN->name
], Mixpost::getWorkspaceMiddlewares()))
    ->prefix('{workspace}')
    ->name('workspaces.')
    ->group(function () {
        Route::put('/', UpdateWorkspaceController::class)->name('update');
        Route::delete('/', DeleteWorkspaceController::class)->name('delete');
    });
