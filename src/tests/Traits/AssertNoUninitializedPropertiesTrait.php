<?php

namespace questbluesdk\tests\Traits;

use ReflectionObject;

trait AssertNoUninitializedPropertiesTrait
{
    private function assertNoUninitializedProperties(object $response): void
    {
        $this->checkPropertiesRecursive($response);
    }

    private function checkPropertiesRecursive(object $object): void
    {
        $reflection = new ReflectionObject($object);

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);

            if (!$property->isInitialized($object)) {
                $this->fail(sprintf(
                    "Uninitialized property '%s' in response of type '%s'.",
                    $property->getName(),
                    $reflection->getName()
                ));
            }

            $value = $property->getValue($object);

            if (is_object($value)) {
                $this->checkPropertiesRecursive($value);
            }

            if (is_array($value)) {
                foreach ($value as $item) {
                    if (is_object($item)) {
                        $this->checkPropertiesRecursive($item);
                    }
                }
            }
        }
    }
}
