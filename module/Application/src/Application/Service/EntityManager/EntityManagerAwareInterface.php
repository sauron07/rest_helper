<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 9/11/14
 * Time: 4:49 PM
 */

namespace Application\Service\EntityManager;

use Doctrine\ORM\EntityManager;

interface EntityManagerAwareInterface
{
    /**
     * @param EntityManager $entityManager
     * @return mixed
     */
    public function setEntityManager(EntityManager $entityManager);
}