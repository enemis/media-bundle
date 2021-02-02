<?php

declare(strict_types=1);

namespace Enemis\MediaBundle;

//use Sonata\CoreBundle\Form\FormHelper;
use Enemis\MediaBundle\DependencyInjection\Compiler\AddProviderCompilerPass;
use Enemis\MediaBundle\DependencyInjection\Compiler\GlobalVariablesCompilerPass;
use Enemis\MediaBundle\DependencyInjection\Compiler\ThumbnailCompilerPass;
//use Enemis\MediaBundle\Form\Type\ApiDoctrineMediaType;
//use Enemis\MediaBundle\Form\Type\ApiGalleryHasMediaType;
//use Enemis\MediaBundle\Form\Type\ApiGalleryType;
//use Enemis\MediaBundle\Form\Type\ApiMediaType;
//use Enemis\MediaBundle\Form\Type\MediaType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class MediaBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
//        $container->addCompilerPass(new AddProviderCompilerPass());
//        $container->addCompilerPass(new GlobalVariablesCompilerPass());
//        $container->addCompilerPass(new ThumbnailCompilerPass());

//        $this->registerFormMapping();
    }

//    /**
//     * {@inheritdoc}
//     */
//    public function boot()
//    {
//        // this is required by the AWS SDK (see: https://github.com/knplabs/Gaufrette)
//        if (!\defined('AWS_CERTIFICATE_AUTHORITY')) {
//            \define('AWS_CERTIFICATE_AUTHORITY', true);
//        }
//
////        $this->registerFormMapping();
//    }
////
////    /**
////     * Register form mapping information.
////     */
////    public function registerFormMapping()
////    {
////        FormHelper::registerFormTypeMapping([
////            'sonata_media_type' => MediaType::class,
////            'sonata_media_api_form_media' => ApiMediaType::class,
////            'sonata_media_api_form_doctrine_media' => ApiDoctrineMediaType::class,
////            'sonata_media_api_form_gallery' => ApiGalleryType::class,
////            'sonata_media_api_form_gallery_has_media' => ApiGalleryHasMediaType::class,
////        ]);
////    }
}
