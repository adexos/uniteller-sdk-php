<?php declare(strict_types=1);
/**
 * This file is part of the Adexos package.
 * (c) Adexos <contact@adexos.fr>
 */

namespace Adexos\Uniteller\Model;

trait ChildrenSerializerTrait
{
    protected function serializeChild(array $childrens): array
    {
        return array_map(static fn(\JsonSerializable $serializable) => $serializable->jsonSerialize(), $childrens);
    }
}
