<?php

namespace Tapp\FilamentCountryCodeField\Tables\Filters;

use Filament\Tables\Filters\SelectFilter;
use Tapp\FilamentCountryCodeField\Concerns\HasCountryCodeData;
use Tapp\FilamentCountryCodeField\Concerns\HasCountryCodeOptions;
use Tapp\FilamentCountryCodeField\Concerns\HasFlags;

class CountryCodeSelectFilter extends SelectFilter
{
    use HasCountryCodeData;
    use HasCountryCodeOptions;
    use HasFlags;

    protected function setUp(): void
    {
        parent::setUp();

        $this->native(false);
        // $this->allowHtml();
        $this->optionsLimit(config('filament-country-code-field.country-code-field.options-limit'));

        $this->searchable();

        $this->getSearchResultsUsing(function (string $search): array {
            $countryCodes = collect($this->getCountriesData())->filter(function ($q) use ($search) {
                return stripos($q['label'], $search) !== false;
            })->pluck('label', 'country_code');

            $result = $countryCodes->mapWithKeys(function ($item, $key) {
                return [$key => $item.' '.$key];
            })->toArray();

            return $result;
        });
    }
}
