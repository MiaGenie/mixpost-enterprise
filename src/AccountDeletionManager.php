<?php

namespace Inovector\MixpostEnterprise;

use Inovector\Mixpost\Abstracts\User;
use Inovector\Mixpost\Concerns\UsesUserModel;
use Inovector\MixpostEnterprise\Actions\User\DeleteUserOwnedWorkspaces;
use Inovector\MixpostEnterprise\Actions\User\DeleteUserSettings;
use Inovector\MixpostEnterprise\Actions\User\DeleteUserTokens;
use Inovector\MixpostEnterprise\Actions\User\DeleteUserTwoFactorAuth;

class AccountDeletionManager
{
    use UsesUserModel;

    public function __construct(
        readonly DeleteUserOwnedWorkspaces $deleteUserOwnedWorkspaces,
        readonly DeleteUserSettings        $deleteUserSettings,
        readonly DeleteUserTokens          $deleteUserTokens,
        readonly DeleteUserTwoFactorAuth   $deleteUserTwoFactorAuth
    )
    {
    }

    public function deleteAccount(User $user): void
    {
        ($this->deleteUserOwnedWorkspaces)($user);
        ($this->deleteUserTokens)($user);
        ($this->deleteUserSettings)($user);
        ($this->deleteUserTwoFactorAuth)($user);

        $this->getUserModel($user)?->delete();
    }

    private function getUserModel(User $user)
    {
        return self::getUserClass()::where('id', $user->id)->first();
    }
}
