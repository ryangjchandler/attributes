<?php

use RyanChandler\Attributes\Attributes;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_ALL)]
class MyAttribute
{
}

#[Attribute]
class AnotherAttribute
{
}

#[MyAttribute]
#[MyAttribute]
class Example
{
    #[MyAttribute]
    #[MyAttribute]
    public function test()
    {
    }

    #[AnotherAttribute]
    public function multiple()
    {
    }
}

test('first() returns the first instance of an attribute on a class', function () {
    $attribute = Attributes::find(MyAttribute::class)->in(Example::class)->first();

    expect($attribute)->toBeInstanceOf(MyAttribute::class);
});

test('first() returns `null` when no attributes are found on a class', function () {
    $attribute = Attributes::find(AnotherAttribute::class)->in(Example::class)->first();

    expect($attribute)->toBeNull();
});

test('all() returns all attributes found on a class', function () {
    $attributes = Attributes::find(MyAttribute::class)->in(Example::class)->all();

    expect($attributes)
        ->toHaveLength(2)
        ->{0}->toBeInstanceOf(MyAttribute::class)
        ->{1}->toBeInstanceOf(MyAttribute::class);
});

test('first() return the first instance of an attribute on a method', function () {
    $attribute = Attributes::find(MyAttribute::class)->in([Example::class, 'test'])->first();

    expect($attribute)->toBeInstanceOf(MyAttribute::class);
});

test('first() returns `null` when no attributes are found on a method', function () {
    $attribute = Attributes::find(AnotherAttribute::class)->in([Example::class, 'test'])->first();

    expect($attribute)->toBeNull();
});

test('all() returns all attributes found on a method', function () {
    $attributes = Attributes::find(MyAttribute::class)
        ->in([Example::class, 'test'])
        ->all();

    expect($attributes)
        ->toHaveLength(2)
        ->{0}->toBeInstanceOf(MyAttribute::class)
        ->{1}->toBeInstanceOf(MyAttribute::class);
});
