<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

final class Customer implements CustomerInterface
{
    private ?string $phone = null;
    private ?string $email = null;

    public function setPhone(string $phone): CustomerInterface
    {
        $this->phone = $phone;
        return $this;
    }

    public function setEmail(string $email): CustomerInterface
    {
        $this->email = $email;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'phone' => (string) $this->phone,
            'email' => (string) $this->email,
        ];
    }
}
