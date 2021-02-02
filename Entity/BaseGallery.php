<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Enemis\MediaBundle\Model\Gallery;

abstract class BaseGallery extends Gallery
{
    public function __construct()
    {
        $this->galleryHasMedias = new ArrayCollection();
    }

    /**
     * Pre Persist method.
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Pre Update method.
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
