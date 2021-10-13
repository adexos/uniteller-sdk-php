<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller;

use Adexos\Uniteller\Model\OrderInterface;
use Adexos\Uniteller\Model\PaymentInterface;
use Adexos\Uniteller\Model\SignableInterface;
use Adexos\Uniteller\Model\SignableOrderInterface;
use Adexos\Uniteller\Model\SignableReceiptInterface;
use Adexos\Uniteller\Signature\SimpleSignature;
use Adexos\Uniteller\Signature\ReceiptSignature;
use Adexos\Uniteller\Signature\SignatureInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class Client implements ClientInterface
{
    private array $options;

    public function __construct(array $options, OptionsResolver $resolver = null)
    {
        $optionResolver = $resolver ?? new OptionsResolver();
        $this->configureOptions($optionResolver);
        $this->options = $optionResolver->resolve($options);
    }

    public function payment(PaymentInterface $payment): RequestInterface
    {
        $payment->setShopIdp($this->options['shop_id']);

        if ($payment instanceof SignableInterface) {
            $payment->signData($this->options['paymentSignature']);
        }

        if ($payment instanceof SignableReceiptInterface) {
            $payment->signReceiptData($this->options['receiptSignature']);
        }

        return  (new Request('POST', $this->options['payment_url']))
            ->withHeader('Content-type', 'application/x-www-form-urlencoded')
            ->withBody(Utils::streamFor(http_build_query($payment->getFormFields())));
    }

    public function isValidOrder(OrderInterface  $order, string $requestSignature): bool
    {
        if ($order instanceof SignableOrderInterface) {
            $order->signOrderData($this->options['orderSignature']);
        }

        return $order->isValid($requestSignature);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setRequired('shop_id');
        $resolver->setRequired('login');
        $resolver->setRequired('password');
        $resolver->setRequired('paymentSignature');
        $resolver->setRequired('receiptSignature');
        $resolver->setRequired('orderSignature');
        $resolver->setDefault('payment_url', 'https://fpay.uniteller.ru/v2/pay');
        $resolver->setAllowedTypes('paymentSignature', SignatureInterface::class);
        $resolver->setAllowedTypes('receiptSignature', SignatureInterface::class);
        $resolver->setAllowedTypes('orderSignature', SignatureInterface::class);
        $resolver->setDefault('paymentSignature', static function (Options $options) {
            return new SimpleSignature($options['password']);
        });
        $resolver->setDefault('receiptSignature', static function (Options $options) {
            return new ReceiptSignature($options['password']);
        });
        $resolver->setDefault('orderSignature', static function (Options $options) {
            return new SimpleSignature($options['password']);
        });
    }
}
