<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Entity;

use Enemis\MediaBundle\Model\Media;

abstract class BaseMedia extends Media
{
    /**
     * {@inheritdoc}
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * {@inheritdoc}
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }
}
