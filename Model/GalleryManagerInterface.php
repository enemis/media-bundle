<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Model;

use Sonata\Doctrine\Model\ManagerInterface;
use Sonata\Doctrine\Model\PageableManagerInterface;

interface GalleryManagerInterface extends ManagerInterface, PageableManagerInterface
{
}
