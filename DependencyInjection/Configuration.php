<?php

namespace Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chaplean_absence_io_client');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        $this->addApiConfiguration($rootNode);

        return $treeBuilder;
    }

    /**
     * @param ArrayNodeDefinition $node
     *
     * @return void
     */
    private function addApiConfiguration(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('api')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('url')->cannotBeEmpty()->end()
                        ->scalarNode('hawk_id')->cannotBeEmpty()->end()
                        ->scalarNode('hawk_key')->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end();
    }
}
