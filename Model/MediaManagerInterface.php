<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Model;

use Sonata\Doctrine\Model\ManagerInterface;
use Sonata\Doctrine\Model\PageableManagerInterface;

interface MediaManagerInterface extends ManagerInterface, PageableManagerInterface
{
}
