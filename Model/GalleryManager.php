<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Model;

abstract class GalleryManager implements GalleryManagerInterface
{
    /**
     * {@inheritdoc}
     */
    public function create()
    {
        $class = $this->getClass();

        return new $class();
    }
}
