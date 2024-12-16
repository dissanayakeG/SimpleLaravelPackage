<?php

namespace Dissanayake\Everest\ServiceProviders;

use Dissanayake\Everest\App\Http\Livewire\ExampleComponent;
use Dissanayake\Everest\App\View\Components\AlertComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class EverestServiceProvider extends ServiceProvider
{
    public function boot(): void {
        $rootPathFromThisLocation = __DIR__ . '/../..';
        $this->loadViewsFrom($rootPathFromThisLocation . '/resources/views', 'everest');
        $this->loadRoutesFrom($rootPathFromThisLocation . '/routes/web_routes.php');
        Blade::component('everest-alert', AlertComponent::class);
        // Livewire::component('example-component', ExampleComponent::class);
        $this->registerLivewireComponents();
    }

    protected function registerLivewireComponents(){
        $namespace = 'Dissanayake\\Everest\\App\\Http\\Livewire';
        $livewirePath = __DIR__ . '/../../app/Http/Livewire';

        if (File::isDirectory($livewirePath)) {
            foreach (File::allFiles($livewirePath) as $file) {
                $className = $namespace . '\\' . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    $file->getRelativePathname()
                );

                if (class_exists($className)) {
                    //i use everest alias here, but it is up to you
                    $alias = 'everest::' . strtolower(preg_replace(
                        '/([a-z])([A-Z])/',
                        '$1-$2',
                        str_replace('\\', '-', str_replace($namespace . '\\', '', $className))
                    ));

                    Livewire::component($alias, $className);
                }
            }
        }
    }
}