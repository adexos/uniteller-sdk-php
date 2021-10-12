<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

interface ReceiptInterface extends \JsonSerializable
{
    public function setCustomer(CustomerInterface $customer): ReceiptInterface;
    public function setTaxMode(int $taxMode): ReceiptInterface;
    public function addLine(ReceiptLineInterface $line): ReceiptInterface;
    public function addPayment(ReceiptPaymentInterface $payment): ReceiptInterface;
    public function setTotal(float $total): ReceiptInterface;
}
