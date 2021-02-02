<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Filesystem;

use Gaufrette\Adapter\Local as BaseLocal;

class Local extends BaseLocal
{
    /**
     * @return string
     */
    public function getDirectory()
    {
        return $this->directory;
    }
}
