<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Provider;

use Enemis\MediaBundle\Model\MediaInterface;

interface MediaProviderInterface
{
    public function requireThumbnails(): bool;

    public function generateThumbnails(MediaInterface $media);

    /**
     * remove linked thumbnails.
     *
     * @param string|array $formats
     */
    public function removeThumbnails(MediaInterface $media, $formats = null);

    /**
     * @return \Gaufrette\File
     */
    public function getReferenceFile(MediaInterface $media);

    /**
     * Generate the public path.
     *
     * @param string $format
     *
     * @return string
     */
    public function generatePublicUrl(MediaInterface $media, $format);

    /**
     * Generate the private path.
     *
     * @param string $format
     *
     * @return string
     */
    public function generatePrivateUrl(MediaInterface $media, $format);


}
