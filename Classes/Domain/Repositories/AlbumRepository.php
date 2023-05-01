<?php
namespace Balumedien\ExtbaseGallery\Domain\Repository;

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
 * The repository for Albums
 */
class AlbumRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	
	// Order by BE sorting
	protected $defaultOrderings = array(
		'albumdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
	);
	
	public function findSortedByGallery($gallery) {
		$query = $this->createQuery();
		$query->setOrderings(array("albumdate" => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
		$query->matching($query->equals('gallery', $gallery));
		$query = $query->execute();
		return $query;
	}
	
}
