<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Model;

/**
 * This a workaround to maintain BC within SonataMediaBundle v3.
 * NEXT_MAJOR: remove this interface, move all methods into GalleryInterface.
 */
interface GalleryMediaCollectionInterface
{
    public function addGalleryHasMedia(GalleryHasMediaInterface $galleryHasMedia);

    public function removeGalleryHasMedia(GalleryHasMediaInterface $galleryHasMedia);
}
