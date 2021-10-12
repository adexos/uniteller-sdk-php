<?php

namespace Adexos\Uniteller;
use Adexos\Uniteller\Model\PaymentInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */
interface ClientInterface
{
    public function payment(PaymentInterface $payment): RequestInterface;
}
