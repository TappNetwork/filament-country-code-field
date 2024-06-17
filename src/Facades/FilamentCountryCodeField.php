<?php

namespace Tapp\FilamentCountryCodeField\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tapp\FilamentCountryCodeField\FilamentCountryCodeField
 */
class FilamentCountryCodeField extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Tapp\FilamentCountryCodeField\FilamentCountryCodeField::class;
    }
}
