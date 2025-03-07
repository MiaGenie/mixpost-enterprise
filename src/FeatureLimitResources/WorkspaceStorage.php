<?php

namespace Inovector\MixpostEnterprise\FeatureLimitResources;

use Inovector\MixpostEnterprise\Abstracts\FeatureLimitResource;
use Inovector\MixpostEnterprise\FeatureLimitFormFields\CountNumber;
use Inovector\MixpostEnterprise\Support\FeatureLimitResponse;

class WorkspaceStorage extends FeatureLimitResource
{
    public string $name = 'Workspace Storage';
    public string $description = 'The maximum storage size of a workspace (MB).';

    public function form(): array
    {
        return [
            CountNumber::make('size')->default(function () {
                return 500;
            })
        ];
    }

    public function validator(?object $data = null): FeatureLimitResponse
    {
        $value = $this->getValue('size');

        if ($value === null) {
            return $this->makePasses();
        }

        $usedBytes = $data->workspace->usedStorage() + $data->file->getSize();
        $maxBytes = (int)$value * 1000 * 1000;

        if ($usedBytes <= $maxBytes) {
            return $this->makePasses();
        }

        return $this->makeFails()
            ->withMessages(__('mixpost-enterprise::feature_limit.max_storage', ['value' => $value]));
    }
}
