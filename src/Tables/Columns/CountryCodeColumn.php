<?php

namespace Tapp\FilamentCountryCodeField\Tables\Columns;

use Filament\Tables\Columns\Column;
use Tapp\FilamentCountryCodeField\Concerns\HasCountryCodeData;
use Tapp\FilamentCountryCodeField\Concerns\HasFlags;

class CountryCodeColumn extends Column
{
    use HasCountryCodeData;
    use HasFlags;

    protected string $view = 'filament-country-code-field::tables.columns.country-code-column';
}
