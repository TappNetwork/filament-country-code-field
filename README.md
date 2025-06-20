# Filament Country Code Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tapp/filament-country-code-field.svg?style=flat-square)](https://packagist.org/packages/tapp/filament-country-code-field)
![GitHub Tests Action Status](https://github.com/TappNetwork/filament-country-code-field/actions/workflows/run-tests.yml/badge.svg)
![Code Style Action Status](https://github.com/TappNetwork/filament-country-code-field/actions/workflows/pint.yml/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/tapp/filament-country-code-field.svg?style=flat-square)](https://packagist.org/packages/tapp/filament-country-code-field)

A country code select form field, table column, and table filter for Laravel Filament.

## Version Compatibility

 Filament | Filament Country Code Field
:---------|:---------------------------
 3.x      | 1.x
 4.x      | 2.x

## Installation

You can install the package via composer:

### For Filament 3

```bash
composer require tapp/filament-country-code-field:"^1.0"
```

### For Filament 4

```bash
composer require tapp/filament-country-code-field:"^2.0"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-country-code-field-config"
```

## Usage

### Form Field

Add to your Filament resource:

```php
use Tapp\FilamentCountryCodeField\Forms\Components\CountryCodeSelect;

public static function form(Form $form): Form
{
    return $form
        ->schema([
            // ...
            CountryCodeSelect::make('country_code'),
            // ...
        ]);
}
```

#### Appareance

![Filament Country Code Field](https://raw.githubusercontent.com/TappNetwork/filament-country-code-field/main/docs/country_code_select.png)

![Filament Country Code Table Column and Filter](https://raw.githubusercontent.com/TappNetwork/filament-country-code-field/main/docs/country_code_column_and_filter.png)

### Table Column

```php
use Tapp\FilamentCountryCodeField\Tables\Columns\CountryCodeColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            //...
            CountryCodeColumn::make('country_code'),
        ])
        // ...
}
```

### Table Filter

```php
use Tapp\FilamentCountryCodeField\Tables\Filters\CountryCodeSelectFilter;

public static function table(Table $table): Table
{
    return $table
        //...
        ->filters([
            CountryCodeSelectFilter::make('country_code'),
            // ...
        ])
}
```
