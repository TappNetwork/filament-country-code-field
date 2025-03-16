<?php

namespace Tapp\FilamentCountryCodeField;

use BladeUI\Icons\Factory;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCountryCodeFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-country-code-field')
            ->hasConfigFile()
            ->hasViews();
        // ->hasTranslations();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('filament-country-code-field', []);

            /*$factory->add('filament-country-code-field', array_merge([
                'path' => __DIR__ . '/../resources/svg',
                'prefix' => '',
            ],
            $config));*/

            $factory->add('flags', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'flags',
            ]);
        });
    }

    public function packageBooted(): void
    {
        $filesystem = new Filesystem;
        $files = $filesystem->allFiles(__DIR__.'/../resources/svg');

        collect($files)->each(function ($file) {
            $filename = pathinfo($file->getFilename(), PATHINFO_FILENAME);

            FilamentIcon::register([
                'flags::'.$filename => 'flags-'.$filename,
            ]);
        })->reject(function ($file) {
            return $file->getExtension() !== 'svg';
        });
    }
}
