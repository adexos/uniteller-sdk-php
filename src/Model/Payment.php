<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;


use Adexos\Uniteller\Signature\SignatureInterface;

final class Payment implements PaymentInterface, SignableInterface, SignableReceiptInterface
{
    private $data = [
        'Shop_IDP' => null,
        'Order_IDP' => null,
        'Subtotal_P' => null,
    ];

    public function setShopIdp(string $shopIdp): PaymentInterface
    {
        $this->data['Shop_IDP'] = $shopIdp;
        return $this;
    }

    public function setOrderIdp(string $orderIdp): PaymentInterface
    {
        $this->data['Order_IDP'] = $orderIdp;
        return $this;
    }

    public function setSubtotalP(float $subtotalP): PaymentInterface
    {
        $this->data['Subtotal_P'] = $subtotalP;
        return $this;
    }

    public function setReceipt(ReceiptInterface $receipt): PaymentInterface
    {
        $this->data['Receipt'] = base64_encode(json_encode($receipt, JSON_THROW_ON_ERROR));
        return $this;
    }

    public function setUrlReturnOk(string $urlReturnOk): PaymentInterface
    {
        $this->data['URL_RETURN_OK'] = $urlReturnOk;
        return $this;
    }

    public function setUrlReturnNo(string $urlRetournNo): PaymentInterface
    {
        $this->data['URL_RETURN_NO'] = $urlRetournNo;
        return $this;
    }

    public function setCurrency(string $currency): PaymentInterface
    {
        $this->data['Currency'] = $currency;
        return $this;
    }

    public function signData(SignatureInterface $signature): self
    {
        $this->data['Signature'] = $signature->sign($this->getSignData());
        return $this;
    }

    public function signReceiptData(SignatureInterface $signature): self
    {
        $this->data['ReceiptSignature'] = $signature->sign($this->getSignReceiptData());
        return $this;
    }


    private function getSignData(): array
    {
        return [
            $this->data['Shop_IDP'],
            $this->data['Order_IDP'],
            $this->data['Subtotal_P']
        ];
    }

    private function getSignReceiptData(): array
    {
        return [
            $this->data['Shop_IDP'],
            $this->data['Order_IDP'],
            $this->data['Subtotal_P'],
            $this->data['Receipt']
        ];
    }

    public function getFormFields(): array
    {
        return $this->data;
    }
}
