<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

final class Receipt implements ReceiptInterface
{
    use AmountFormatterTrait;
    use ChildrenSerializerTrait;

    private ?CustomerInterface $customer = null;
    private int $taxMode = 0;
    /** @var array|ReceiptLineInterface[] */
    private array $lines = [];
    /** @var array|ReceiptPaymentInterface[] */
    private array $payments = [];
    private ?float $total = null;

    public function setCustomer(CustomerInterface $customer): ReceiptInterface
    {
        $this->customer = $customer;
        return $this;
    }

    public function setTaxMode(int $taxMode): ReceiptInterface
    {
        $this->taxMode = $taxMode;
        return $this;
    }

    public function addLine(ReceiptLineInterface $line): ReceiptInterface
    {
        $this->lines[] = $line;
        return $this;
    }

    public function addPayment(ReceiptPaymentInterface $payment): ReceiptInterface
    {
        $this->payments[] = $payment;
        return $this;
    }

    public function setTotal(float $total): ReceiptInterface
    {
        $this->total = $total;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'customer' => $this->customer->jsonSerialize(),
            'taxmode' => $this->taxMode,
            'lines' => $this->serializeChild($this->lines),
            'payments' => $this->serializeChild($this->payments),
            'total' => $this->formatAmount($this->total)
        ];
    }
}
