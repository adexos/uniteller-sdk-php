<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

final class ReceiptPayment implements ReceiptPaymentInterface
{
    use AmountFormatterTrait;

    private int $kind = 1;
    private int $type = 0;
    private float $amount = 0;

    public function setKind(int $kind): ReceiptPaymentInterface
    {
        $this->kind = $kind;
        return $this;
    }

    public function setType(int $type): ReceiptPaymentInterface
    {
        $this->type = $type;
        return $this;
    }

    public function setAmount(float $amount): ReceiptPaymentInterface
    {
        $this->amount = $amount;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'kind' => (string) $this->kind,
            'type' => (string) $this->type,
            'amount' => $this->formatAmount($this->amount)
        ];
    }
}
