<?php

namespace App\DataMigration\Transformer;

use Fogswimmer\DataMigration\Contract\DataMigrationTransformerInterface;

final class ExampleTransformer implements DataMigrationTransformerInterface
{
    public function getName(): string
    {
        return 'example';
    }

    public function transform(mixed $value, mixed $params = null): mixed
    {
        return trim((string) $value);
    }
}
