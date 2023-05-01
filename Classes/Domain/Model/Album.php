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
 * Album
 */
class Album extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * gallery
	 *
	 * @var \Balumedien\ExtbaseGallery\Domain\Model\Gallery
	 */
	protected $gallery = '';
	
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
	 * albumdate
	 *
	 * @var int
	 */
	protected $albumdate = '';
	
	/**
	 * images
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $images = NULL;
	
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
		$this->images = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}
	
	/**
	 * Returns the gallery
	 * @return \Balumedien\ExtbaseGallery\Domain\Model\Gallery $gallery
	 */
	public function getGallery() {
		return $this->gallery;
	}
	
	/**
	 * Sets the gallery
	 * @param \Balumedien\ExtbaseGallery\Domain\Model\Gallery $gallery
	 * @return void
	 */
	public function setGallery($gallery) {
		$this->gallery = $gallery;
	}
	
	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the albumdate
	 *
	 * @return int $albumdate
	 */
	public function getAlbumdate() {
		return $this->albumdate;
	}

	/**
	 * Sets the albumdate
	 *
	 * @param string $albumdate
	 * @return void
	 */
	public function setAlbumdate($albumdate) {
		$this->albumdate = $albumdate;
	}
	
	/**
	 * Adds a Image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $album
	 * @return void
	 */
	public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $album) {
		$this->images->attach($image);
	}
	
	/**
	 * Removes a Image
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image The Image to be removed
	 * @return void
	 */
	public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image) {
		$this->images->detach($image);
	}
	
	/**
	 * Returns the image
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 */
	public function getImages() {
			return $this->images;
	}

	/**
	 * Sets the image
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
	 * @return void
	 */
	public function setImages($images) {
			$this->images = $images;
	}
}
