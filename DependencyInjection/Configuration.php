<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('enemis_media');

        $node = $treeBuilder->getRootNode();
        $node
            ->children()
                ->arrayNode('medias')
                    ->useAttributeAsKey('id')
                    ->arrayPrototype()
                        ->children()
                            ->arrayNode('class')
                                ->arrayPrototype()
                                ->children()
                                    ->scalarNode('media')->isRequired()->end()
                                    ->scalarNode('gallery')->isRequired()->end()
                                    ->scalarNode('gallery_has_media')->isRequired()->end()
                                ->end()
                            ->end()
                    ->end()
                    ->scalarNode('db_driver')->defaultValue('doctrine_orm')->end()
                    ->scalarNode('thumbnail')->defaultValue('sonata.media.thumbnail.format')->end()
                    ->arrayNode('download')
                        ->arrayPrototype()
                            ->children()
                                ->scalarNode('strategy')->defaultValue('sonata.media.security.superadmin_strategy')->end()
                                ->scalarNode('mode')->defaultValue('http')->end()
                            ->end()
                        ->end()
                    ->end()
                    ->arrayNode('formats')
                        ->requiresAtLeastOneElement()
                        ->useAttributeAsKey('id')
                        ->scalarPrototype()->end()
                    ->end()
                    ->scalarNode('admin_format')->end()
                    ->scalarNode('reference_format')->end()
                    ->arrayNode('cdn')
                        ->arrayPrototype()
                            ->children()
                                ->scalarNode('master')->isRequired()->end()
                                ->scalarNode('fallback')->defaultValue('nofallback')->end()
                            ->end()
                        ->end()
                    ->end()
                    ->arrayNode('providers')
                        ->requiresAtLeastOneElement()
                        ->scalarPrototype()->end()
                    ->end()
                ->end()
            ->end();

        $this->addCdnSection($node);
        $this->addFilesystemSection($node);
        $this->addResizerSection($node);
        $this->addAdapterSection($node);
        $this->addProvidersSection($node);

        return $treeBuilder;
    }

    private function addCdnSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('cdn')
                    ->cannotBeEmpty()
                    ->useAttributeAsKey('id')
                    ->requiresAtLeastOneElement()
                        ->arrayPrototype()
                        ->ignoreExtraKeys()
                            ->children()
                                ->scalarNode('service')->cannotBeEmpty()->isRequired()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addFilesystemSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->scalarNode('filesystem')->cannotBeEmpty()->isRequired()->end()
            ->end()
        ;
    }

    private function addResizerSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resizers')
                    ->cannotBeEmpty()
                    ->requiresAtLeastOneElement()
                    ->useAttributeAsKey('id')
                    ->arrayPrototype()
                        ->ignoreExtraKeys()
                        ->children()
                            ->scalarNode('service')->isRequired()->cannotBeEmpty()->end()
                            ->scalarNode('mode')->defaultValue('inset')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addAdapterSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('adapters')
                    ->cannotBeEmpty()
                    ->useAttributeAsKey('id')
                    ->requiresAtLeastOneElement()
                    ->arrayPrototype()
                        ->ignoreExtraKeys()
                            ->children()
                                ->scalarNode('service')->isRequired()->cannotBeEmpty()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

    private function addProvidersSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('providers')
                    ->cannotBeEmpty()
                    ->useAttributeAsKey('id')
                    ->requiresAtLeastOneElement()
                        ->arrayPrototype()
                            ->ignoreExtraKeys()
                            ->children()
                                ->scalarNode('service')->isRequired()->cannotBeEmpty()->end()
                                ->scalarNode('resizer')->isRequired()->cannotBeEmpty()->end()
                                ->scalarNode('filesystem')->isRequired()->cannotBeEmpty()->end()
                                ->scalarNode('cdn')->isRequired()->cannotBeEmpty()->end()
                                ->scalarNode('generator')->defaultValue('sonata.media.generator.default')->end()
                                ->scalarNode('thumbnail')->defaultValue('sonata.media.thumbnail.format')->end()
                                ->arrayNode('allowed_extensions')
                                    ->prototype('scalar')->end()
                                    ->defaultValue([])
                                ->end()
                                ->arrayNode('allowed_mime_types')
                                    ->prototype('scalar')->end()
                                    ->defaultValue([])
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
