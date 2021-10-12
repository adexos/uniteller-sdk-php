<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

use Adexos\Uniteller\Signature\SignatureInterface;

interface SignableInterface
{
    public function signData(SignatureInterface $signature): self;
}
