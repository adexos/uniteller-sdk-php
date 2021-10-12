<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

interface PaymentInterface extends Formalizable
{
    public function setShopIdp(string $shopIdp): PaymentInterface;
    public function setOrderIdp(string $orderIdp): PaymentInterface;
    public function setSubtotalP(float $subtotalP): PaymentInterface;
    public function setReceipt(ReceiptInterface $receipt): PaymentInterface;
    public function setUrlReturnOk(string $urlReturnOk): PaymentInterface;
    public function setUrlReturnNo(string $urlRetournNo): PaymentInterface;
    public function setCurrency(string $currency): PaymentInterface;
}
