<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Entity;

use Enemis\MediaBundle\Model\GalleryHasMedia;

abstract class BaseGalleryHasMedia extends GalleryHasMedia
{
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
