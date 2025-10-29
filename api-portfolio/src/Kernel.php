<?php
namespace App;

use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollectionBuilder;

class Kernel extends BaseKernel
{
    public function registerBundles(): iterable
    {
        return [];
    }

    public function configureContainer(ContainerBuilder $c, LoaderInterface $loader): void
    {
        // Pas de services pour ce mini-projet
    }

    public function configureRoutes(RouteCollectionBuilder $routes): void
    {
        // Pas de routes pour ce mini-projet
    }
}
