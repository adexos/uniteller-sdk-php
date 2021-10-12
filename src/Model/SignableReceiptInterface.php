<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

use Adexos\Uniteller\Signature\SignatureInterface;

interface SignableReceiptInterface
{
    public function signReceiptData(SignatureInterface $signature): self;
}
