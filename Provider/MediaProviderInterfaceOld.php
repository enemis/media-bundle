<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Provider;

use Gaufrette\Filesystem;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Enemis\MediaBundle\Model\MediaInterface;
use Enemis\MediaBundle\Resizer\ResizerInterface;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\Response;

interface MediaProviderInterface
{
    // This format is used to display thumbnails in Sonata Admin
    public const FORMAT_ADMIN = 'admin';

    // This format holds the original media
    public const FORMAT_REFERENCE = 'reference';

//    /**
//     * @param string $name
//     * @param array  $format
//     */
//    public function addFormat($name, $format);

//    /**
//     * return the format settings.
//     *
//     * @param string $name
//     *
//     * @return array|false the format settings
//     */
//    public function getFormat($name);

    /**
     * @return \Gaufrette\File
     */
    public function getReferenceFile(MediaInterface $media);

    /**
     * return the correct format name : providerName_format.
     *
     * @param string $format
     *
     * @return string
     */
    public function getFormatName(MediaInterface $media, $format);

    /**
     * return the reference image of the media, can be the video thumbnail or the original uploaded picture.
     *
     * @return string to the reference image
     */
    public function getReferenceImage(MediaInterface $media);

    public function preUpdate(MediaInterface $media);

    public function postUpdate(MediaInterface $media);

    public function preRemove(MediaInterface $media);

    public function postRemove(MediaInterface $media);

    /**
     * build the related create form.
     */
    public function buildCreateForm(FormMapper $formMapper);

    /**
     * build the related create form.
     */
    public function buildEditForm(FormMapper $formMapper);

    public function prePersist(MediaInterface $media);

    public function postPersist(MediaInterface $media);

    /**
     * @param string $format
     * @param array  $options
     */
    public function getHelperProperties(MediaInterface $media, $format, $options = []);

    /**
     * Generate the media path.
     *
     * @return string
     */
    public function generatePath(MediaInterface $media);

    /**
     * @return array
     */
    public function getFormats();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return MetadataInterface
     */
    public function getProviderMetadata();

    public function setTemplates(array $templates);

    /**
     * @return string[]
     */
    public function getTemplates();

    /**
     * @param string $name
     *
     * @return string
     */
    public function getTemplate($name);

    /**
     * Mode can be x-file.
     *
     * @param string $format
     * @param string $mode
     *
     * @return Response
     */
    public function getDownloadResponse(MediaInterface $media, $format, $mode, array $headers = []);

    /**
     * @return ResizerInterface
     */
    public function getResizer();

    /**
     * @return Filesystem
     */
    public function getFilesystem();

    /**
     * @param string $relativePath
     * @param bool   $isFlushable
     */
    public function getCdnPath($relativePath, $isFlushable);

    public function transform(MediaInterface $media);

    public function validate(ErrorElement $errorElement, MediaInterface $media);

    public function buildMediaType(FormBuilder $formBuilder);

    /**
     * @param bool $force
     */
    public function updateMetadata(MediaInterface $media, $force = false);
}
