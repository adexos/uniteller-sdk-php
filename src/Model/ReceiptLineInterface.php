<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

interface ReceiptLineInterface extends \JsonSerializable
{
    public function setName(string $name): ReceiptLineInterface;
    public function setPrice(float $price): ReceiptLineInterface;
    public function setSum(float $sum): ReceiptLineInterface;
    public function setQty(int $qty): ReceiptLineInterface;
    public function setVat(int $vat): ReceiptLineInterface;
    public function setPayattr(int $payattr): ReceiptLineInterface;
    public function setLineattr(int $lineattr): ReceiptLineInterface;
}
