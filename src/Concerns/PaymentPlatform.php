<?php

namespace Inovector\MixpostEnterprise\Concerns;

use Inovector\MixpostEnterprise\PaymentPlatform as PaymentPlatformCore;
use Inovector\MixpostEnterprise\Contracts\PaymentPlatform as PaymentPlatformContract;

trait PaymentPlatform
{
    public function activePlatform(): PaymentPlatformContract
    {
        return PaymentPlatformCore::activePlatformInstance();
    }
}
