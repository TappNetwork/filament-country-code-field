<?php

namespace Tapp\FilamentCountryCodeField\Concerns;

use Tapp\FilamentCountryCodeField\Enums\CountriesEnum;

trait HasCountryCodeData
{
    public function getCountriesData(): array
    {
        return collect(CountriesEnum::cases())->map(function (CountriesEnum $country): array {
            return [
                'label' => $country->getLabel(),
                'country_code' => $country->getCountryCode(),
                'iso_code' => $country->value,
            ];
        })->toArray();
    }

    public function getIsoCodeByCountryCode($countryCode)
    {
        $data = collect($this->getCountriesData());

        $isoCode = $data->where('country_code', $countryCode)->first();

        return (string) str($isoCode['iso_code'])->lower();
    }
}
