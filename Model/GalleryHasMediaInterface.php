<?php

declare(strict_types=1);

namespace Enemis\MediaBundle\Model;

interface GalleryHasMediaInterface
{
    /**
     * @return string
     */
    public function __toString();

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled);

    /**
     * @return bool
     */
    public function getEnabled();

    public function setGallery(?GalleryInterface $gallery = null);

    /**
     * @return GalleryInterface|null
     */
    public function getGallery();

    public function setMedia(?MediaInterface $media = null);

    /**
     * @return MediaInterface|null
     */
    public function getMedia();

    /**
     * @param int $position
     *
     * @return int
     */
    public function setPosition($position);

    /**
     * @return int
     */
    public function getPosition();

    public function setUpdatedAt(?\DateTime $updatedAt = null);

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt();

    public function setCreatedAt(?\DateTime $createdAt = null);

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt();
}
