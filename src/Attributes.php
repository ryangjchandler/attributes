<?php

namespace RyanChandler\Attributes;

use ReflectionAttribute;
use ReflectionClass;
use ReflectionMethod;

final class Attributes
{
    private ReflectionClass|ReflectionMethod $reflector;

    private function __construct(
        private string $attribute
    ) {
    }

    public static function find(string $attribute): self
    {
        return new self($attribute);
    }

    public function in(string|array $target): self
    {
        [$class, $method] = is_array($target) ? $target : [$target, null];

        $this->reflector = new ReflectionClass($class);

        if ($method === null) {
            return $this;
        }

        $this->reflector = $this->reflector->getMethod($method);

        return $this;
    }

    public function all(): array
    {
        return array_map(function (ReflectionAttribute $attribute) {
            return $attribute->newInstance();
        }, $this->attributes());
    }

    public function first()
    {
        $attributes = $this->attributes();

        return count($attributes) > 0 ? $attributes[0]->newInstance() : null;
    }

    public function exists(): bool
    {
        return count($this->all()) > 0;
    }

    private function attributes(): array
    {
        return $this->reflector->getAttributes($this->attribute, ReflectionAttribute::IS_INSTANCEOF);
    }
}
