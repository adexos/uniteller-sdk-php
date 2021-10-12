<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Signature;


final class PaymentSignature implements SignatureInterface
{
    use PasswordAwareTrait;

    public function sign(array $data): string
    {
        $data['Password'] = $this->getPassword();
        return strtoupper(md5(implode('', $data)));
    }
}
