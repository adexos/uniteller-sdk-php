<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

use Adexos\Uniteller\Signature\SignatureInterface;

final class Order implements OrderInterface, SignableOrderInterface
{
    private string $orderId = '';
    private string $status = Status::NEW;
    private string $signature = '';

    public function setOrderId(string $orderId): OrderInterface
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function setStatus(string $status): OrderInterface
    {
        $this->status = $status;
        return $this;
    }

    public function signOrderData(SignatureInterface $signature): SignableOrderInterface
    {
        $this->signature = $signature->sign($this->getSignData());
        return $this;
    }

    public function isValid(string $requestSignature): bool
    {
        return $this->signature === $requestSignature;
    }

    private function getSignData()
    {
        return [
            $this->orderId,
            $this->status
        ];
    }
}
