<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

interface ReceiptPaymentInterface extends \JsonSerializable
{
    public function setKind(int $kind): ReceiptPaymentInterface;
    public function setType(int $type): ReceiptPaymentInterface;
    public function setAmount(float $amount): ReceiptPaymentInterface;
}
