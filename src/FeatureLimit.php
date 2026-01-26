<?php

namespace Inovector\MixpostEnterprise;

use Illuminate\Support\Arr;
use Inovector\MixpostEnterprise\FeatureLimitResources\AICredits;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\BlueskyPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\FacebookPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\InstagramPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\LinkedinPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\MastodonPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\PinterestPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\ThreadsPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\TiktokPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\TwitterPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\Genie\YoutubePosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\NumberOfBrandsSocialAccounts;
use Inovector\MixpostEnterprise\FeatureLimitResources\NumberOfSocialAccounts;
use Inovector\MixpostEnterprise\FeatureLimitResources\ScheduledPosts;
use Inovector\MixpostEnterprise\FeatureLimitResources\WorkspaceMembers;
use Inovector\MixpostEnterprise\FeatureLimitResources\WorkspaceStorage;

class FeatureLimit
{
    private static function registered(): array
    {
        return [
            TwitterPosts::class,
            FacebookPosts::class,
            InstagramPosts::class,
            ThreadsPosts::class,
            MastodonPosts::class,
            YoutubePosts::class,
            PinterestPosts::class,
            LinkedInPosts::class,
            TiktokPosts::class,
            BlueskyPosts::class,
            ScheduledPosts::class,
            NumberOfSocialAccounts::class,
            NumberOfBrandsSocialAccounts::class,
            WorkspaceMembers::class,
            WorkspaceStorage::class,
            AICredits::class,
        ];
    }

    public static function list(): array
    {
        return Arr::map(self::registered(), function ($item) {
            return app($item)->render();
        });
    }
}
