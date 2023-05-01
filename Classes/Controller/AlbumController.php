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
 * AlbumController
 */
class AlbumController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * action show
	 *
	 * @param \Balumedien\ExtbaseGallery\Domain\Model\Album $album
	 * @return void
	 */
	public function showAction(\Balumedien\ExtbaseGallery\Domain\Model\Album $album) {
		$this->view->assign('gallery', $album->getGallery());
		$this->view->assign('album', $album);
	}
	
}