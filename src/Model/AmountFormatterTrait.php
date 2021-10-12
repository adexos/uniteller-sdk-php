<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

trait AmountFormatterTrait
{
    protected function formatAmount(float $amount): string
    {
        return sprintf('%.2f', $amount);
    }
}
