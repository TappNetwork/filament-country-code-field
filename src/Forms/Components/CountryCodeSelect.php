<?php

namespace Tapp\FilamentCountryCodeField\Forms\Components;

use Filament\Forms\Components\Select;
use Illuminate\Contracts\View\View;
use Tapp\FilamentCountryCodeField\Concerns\HasCountryCodeData;
use Tapp\FilamentCountryCodeField\Concerns\HasCountryCodeOptions;
use Tapp\FilamentCountryCodeField\Concerns\HasFlags;

class CountryCodeSelect extends Select
{
    use HasCountryCodeData;
    use HasCountryCodeOptions;
    use HasFlags;

    protected function setUp(): void
    {
        parent::setUp();

        $this->native(false);
        $this->allowHtml();
        $this->optionsLimit(config('filament-country-code-field.country-code-field.options-limit'));

        $this->searchable();

        $this->getSearchResultsUsing(function (string $search): array {
            $countryCodes = collect($this->getCountriesData())->filter(function ($q) use ($search) {
                return false !== stripos($q['label'], $search);
            })->pluck('country_code')->toArray();

            $result = [];

            $result = collect($this->getCountries())->filter(function ($item, $key) use ($countryCodes) {
                return array_search($key, $countryCodes) !== false;
            });

            return $result->toArray();
        });

        // selected label
        $this->getOptionLabelUsing(function ($value): ?string {
            if ($value === '+1') {
                return "United States and Canada +1";
            }

            if ($value === '+7') {
                return "Russia and Kazakhstan +7";
            }

            return $value;
        });
    }
}
