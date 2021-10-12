<?php
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Signature;

interface SignatureInterface
{
    public function sign(array $data): string;
}
