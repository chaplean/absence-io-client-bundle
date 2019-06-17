<?php
/*
 *
 * This file is part of the AbsenceIoClientBundle package.
 *
 * (c) Chaplean.coop <contact@chaplean.coop>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle.
 */
final class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('chaplean_absence_io_client');
        $this->addApiConfiguration($treeBuilder->getRootNode());

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
