<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Signature;


final class ReceiptSignature implements SignatureInterface
{
    use PasswordAwareTrait;

    public function sign(array $data): string
    {
        $data['Password'] = $this->getPassword();
        return strtoupper($this->encrypt(implode('&', array_map(fn($val) => $this->encrypt($val),$data))));
    }

    private function encrypt($value): string
    {
        return hash('sha256', (string) $value);
    }
}
