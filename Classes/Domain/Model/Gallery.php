<?php
namespace Balumedien\ExtbaseGallery\Domain\Model;

/***
 *
 * This file is part of the "ExtbaseGallery" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Christian Knell <christian.knell@balumedien.de>, Balumedien
 *
 ***/

/**
 * Gallery
 */
class Gallery extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * albums
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\ExtbaseGallery\Domain\Model\Album>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade remove
     */
    protected $albums = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->albums = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Album
     *
     * @param \Balumedien\ExtbaseGallery\Domain\Model\Album $album
     * @return void
     */
    public function addAlbum(\Balumedien\ExtbaseGallery\Domain\Model\Album $album)
    {
        $this->albums->attach($album);
    }

    /**
     * Removes a Album
     *
     * @param \Balumedien\ExtbaseGallery\Domain\Model\Album $albumToRemove The Album to be removed
     * @return void
     */
    public function removeAlbum(\Balumedien\ExtbaseGallery\Domain\Model\Album $albumToRemove)
    {
        $this->albums->detach($albumToRemove);
    }

    /**
     * Returns the albums
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\ExtbaseGallery\Domain\Model\Album> $albums
     */
    public function getAlbums()
    {
        return $this->albums;
    }

    /**
     * Sets the albums
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Balumedien\ExtbaseGallery\Domain\Model\Album> $albums
     * @return void
     */
    public function setAlbums(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $albums)
    {
        $this->albums = $albums;
    }
}
