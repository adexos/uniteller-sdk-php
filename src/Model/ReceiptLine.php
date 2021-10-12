<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

final class ReceiptLine implements ReceiptLineInterface
{
    use AmountFormatterTrait;

    private string $name = '';
    private float $price = 0;
    private int $qty = 0;
    private int $vat = 0;
    private int $payattr = 1;
    private int $lineattr = 1;

    public function setName(string $name): ReceiptLineInterface
    {
        $this->name = $name;
        return $this;
    }

    public function setPrice(float $price): ReceiptLineInterface
    {
        $this->price = $price;
        return $this;
    }

    public function setQty(int $qty): ReceiptLineInterface
    {
        $this->qty = $qty;
        return $this;
    }

    public function setVat(int $vat): ReceiptLineInterface
    {
        $this->vat = $vat;
        return $this;
    }

    public function setPayattr(int $payattr): ReceiptLineInterface
    {
        $this->payattr = $payattr;
        return $this;

    }

    public function setLineattr(int $lineattr): ReceiptLineInterface
    {
        $this->lineattr = $lineattr;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'price' => $this->formatAmount($this->price),
            'qty' => $this->qty,
            'sum' => $this->formatAmount($this->price * $this->qty),
            'vat' => $this->vat,
            'payattr' => $this->payattr,
            'lineattr' => $this->lineattr
        ];
    }
}
