<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

use Adexos\Uniteller\Signature\SignatureInterface;

interface SignableOrderInterface
{
    public function signOrderData(SignatureInterface $signature): self;
}
