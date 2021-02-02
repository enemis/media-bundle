<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Provider;

/**
 * NEXT_MAJOR: Remove CoreBundle dependency.
 */
interface MetadataInterface extends \Sonata\CoreBundle\Model\MetadataInterface
{
    public function getTitle(): string;

    public function getDescription(): ?string;

    public function getImage(): string;

    public function getDomain(): ?string;

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array;

    /**
     * @param string $name    The option key
     * @param mixed  $default The default value if option not found
     */
    public function getOption($name, $default = null);
}
