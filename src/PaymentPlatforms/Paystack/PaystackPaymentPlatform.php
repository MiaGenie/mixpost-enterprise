<?php

namespace Inovector\MixpostEnterprise\PaymentPlatforms\Paystack;

use Inovector\MixpostEnterprise\Abstracts\PaymentPlatform;
use Inovector\MixpostEnterprise\PaymentPlatforms\Paystack\Concerns\HandleWebhook;
use Inovector\MixpostEnterprise\PaymentPlatforms\Paystack\Concerns\SDK;
use Inovector\MixpostEnterprise\PaymentPlatforms\Paystack\Concerns\ManagesSubscriptions;
use Inovector\MixpostEnterprise\PaymentPlatforms\Paystack\Concerns\PaystackForm;

class PaystackPaymentPlatform extends PaymentPlatform
{
    use PaystackForm;
    use SDK;
    use ManagesSubscriptions;
    use HandleWebhook;

    public static function name(): string
    {
        return 'paystack';
    }

    public static function readableName(): string
    {
        return 'Paystack';
    }

    public static function component(): string
    {
        return 'Paystack';
    }

    public function supportSwapSubscription(): bool
    {
        return false;
    }

    public function supportTrialing(): bool
    {
        return false;
    }

    public function supportCoupon(): bool
    {
        return false;
    }
}
