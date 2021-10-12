<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

interface CustomerInterface extends \JsonSerializable
{
    public function setPhone(string $phone): CustomerInterface;
    public function setEmail(string $email): CustomerInterface;
}
