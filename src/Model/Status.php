<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

final class Status
{
    public const NEW = 'new';
    public const AUTHORIZED = 'authorized';
    public const NOT_AUTHORIZED = 'not_authorized';
    public const PAID = 'paid';
    public const CANCELLED = 'cancelled';
    public const WAITING = 'waiting';
}
