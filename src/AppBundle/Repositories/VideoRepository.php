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

    public function getVidById($id) {
    	return $this->getEntityManager()->createQuery('SELECT v FROM AppBundle:Video v WHERE v.id LIKE :id')->setParameter('id',$id)->getOneOrNullResult();;
    }
}