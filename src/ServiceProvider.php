<?php

declare(strict_types=1);

namespace BombenProdukt\FakeRouteKey;

use BombenProdukt\FakeRouteKey\Contracts\Strategy;
use BombenProdukt\PackagePowerPack\Package\AbstractServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton(Strategy::class, function (Application $app): Strategy {
            /** @var Repository */
            $config = $app->get(Repository::class);

            return $app->make($config->get('fake-route-key.strategy'));
        });
    }
}
