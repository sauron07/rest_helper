<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 9/11/14
 * Time: 4:51 PM
 */

namespace Application\Service\EntityManager;

use Doctrine\ORM\EntityManager;

trait EntityManagerAwareTrait
{
    /** @var  EntityManager */
    protected $em;

    /**
     * @param EntityManager $em
     * @return $this
     */
    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
        return $this;
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->em;
    }
}