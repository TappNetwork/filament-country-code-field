<?php

namespace Tapp\FilamentCountryCodeField\Concerns;

trait HasCountryCodeOptions
{
    public function getOptions(): array
    {
        $options = $this->getCountries();

        $this->options = $options;

        return $this->options;
    }

    public function getCountries(): array
    {
        foreach ($this->getCountriesData() as $country) {
            $countryCode = $country['country_code'] ?? null;
            $isoCode = $country['iso_code'] ?? null;

            $data[$countryCode] = method_exists($this, 'allowHtml') ? $this->getHtmlOption($country) : $country['label'].' '.$country['country_code'];
        }

        return $data;
    }

    public function getHtmlOption($country)
    {
        $isoCode = $country['iso_code'] ?? null;

        return view('filament-country-code-field::select-option')
            ->with('label', $country['label'])
            ->with('country_code', $country['country_code'])
            ->with('iso_code', strtolower($isoCode))
            ->with('hasFlags', $this->flags)
            ->with('selected', $this->getState())
            ->render();
    }
}
