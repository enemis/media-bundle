<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Provider;

interface FileProviderInterface extends MediaProviderInterface
{
    /**
     * @return string[]
     */
    public function getAllowedExtensions();

    /**
     * @return string[]
     */
    public function getAllowedMimeTypes();
}
