<?php

namespace Inovector\MixpostEnterprise\FeatureLimitResources\Genie;

use Inovector\Mixpost\Enums\PostStatus;
use Inovector\Mixpost\Models\Post;
use Inovector\MixpostEnterprise\Abstracts\FeatureLimitResource;
use Inovector\MixpostEnterprise\FeatureLimitFormFields\CountNumber;
use Inovector\MixpostEnterprise\Support\FeatureLimitResponse;

class PinterestPosts extends FeatureLimitResource
{
    public string $name = 'Pinterest Posts';
    public string $description = 'The number of Pinterest posts users can do per day.';

    public function form(): array
    {
        return [
            CountNumber::make('count')->default(function () {
                return 5;
            })
        ];
    }

    public function validator(?object $data = null): FeatureLimitResponse
    {
        $value = $this->getValue('count');

        if ($value === null) {
            return $this->makePasses();
        }

        $count = Post::byWorkspace($data->workspace)
            ->whereRelation('accounts', 'provider', 'pinterest')
            ->whereDate('scheduled_at', $data->post->scheduled_at)
            ->where(function ($query) {
                $query->where('status', PostStatus::SCHEDULED->value)
                    ->orWhere('status', PostStatus::PUBLISHED->value);
            })
            ->count();

        if ($count <= (int)$value) {
            return $this->makePasses();
        }

        return $this->makeFails()
            ->withMessages(__('genie.max_pinterest_daily_posts', ['value' => $value]));
    }
}
