<?php

namespace Inovector\MixpostEnterprise\Listeners\Post;

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
use Inovector\MixpostEnterprise\FeatureLimitResources\ScheduledPosts;

class ValidateLimitsOnSchedulingPost
{
    public function handle(object $event): void
    {
        if ($event->workspace->unlimitedAccess()) {
            return;
        }

        app(ScheduledPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(TwitterPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(FacebookPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(InstagramPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(ThreadsPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(MastodonPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(YoutubePosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(PinterestPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(LinkedinPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(TiktokPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();

        app(BlueskyPosts::class)
            ->limits($event->workspace->limits)
            ->validator($event)
            ->validate();
    }
}
