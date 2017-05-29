<?php

namespace AppBundle\Repositories;

use Doctrine\ORM\EntityRepository;

class VideoRepository extends EntityRepository{

    /**
	 * Method to show up videos charged
	 * @return Video
	 */
    public function getAllVideo() {
    	return $this->getEntityManager()->createQuery('SELECT * FROM AppBundle:Video');
    }
}