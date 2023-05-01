<?php
namespace Balumedien\ExtbaseGallery\Controller;

/***
 *
 * This file is part of the "Extbase Gallery" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019
 *
 ***/

/**
 * GalleryController
 */
class GalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * galleryRepository
	 *
	 * @var \Balumedien\ExtbaseGallery\Domain\Repository\GalleryRepository
	 * @TYPO3\CMS\Extbase\Annotation\Inject
	 */
	protected $galleryRepository = null;
	
	/**
	 * albumRepository
	 *
	 * @var \Balumedien\ExtbaseGallery\Domain\Repository\AlbumRepository
	 * @TYPO3\CMS\Extbase\Annotation\Inject
	 */
	protected $albumRepository = null;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$galleries = $this->galleryRepository->findAll();
		$this->view->assign('galleries', $galleries);
	}
	
	/**
	 * action show
	 *
	 * @param \Balumedien\ExtbaseGallery\Domain\Model\Gallery $gallery
	 * @return void
	 */
	public function showAction(\Balumedien\ExtbaseGallery\Domain\Model\Gallery $gallery) {
		$albums = $this->albumRepository->findSortedByGallery($gallery);
		$this->view->assign('albums', $albums);
		$this->view->assign('gallery', $gallery);
	}
	
}
