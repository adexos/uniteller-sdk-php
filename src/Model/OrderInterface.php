<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

use Sylius\Component\Core\Model\OrderItem;

interface OrderInterface
{
    public function setOrderId(string $orderId): OrderInterface;
    public function setStatus(string $status): OrderInterface;
    public function isValid(string $requestSignature): bool;
}
