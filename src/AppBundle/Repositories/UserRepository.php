<?php

namespace AppBundle\Repositories;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    /**
     * Method that searches a User that has the nickname received as parameter
     * @param $nickname
     * @return User
     */
    public function findByNickname($nickname) {

        return $this->getEntityManager()->createQuery('SELECT u FROM AppBundle:User u WHERE u.nickname LIKE :nickname')->setParameter('nickname',$nickname)->getOneOrNullResult();
    }
}