<?php

namespace Inovector\MixpostEnterprise\PaymentPlatforms\Stripe;

use Inovector\MixpostEnterprise\Models\Workspace;
use Inovector\MixpostEnterprise\PaymentPlatforms\Stripe\Concerns\ManagesCustomer;
use Inovector\MixpostEnterprise\PaymentPlatforms\Stripe\Concerns\ManagesPaymentMethods;
use Inovector\MixpostEnterprise\PaymentPlatforms\Stripe\Concerns\SDK;

class Billable
{
    use SDK;
    use ManagesCustomer;
    use ManagesPaymentMethods;

    public Workspace $workspace;

    public function __construct(public readonly array $credentials, Workspace $workspace)
    {
        $this->workspace = $workspace;
    }
}
