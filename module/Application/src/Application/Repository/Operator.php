<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 19.09.14
 * Time: 11:46
 */

namespace Application\Repository;

use Application\Entity\Operators;
use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections;

class Operator extends EntityRepository
{
    public function registration(Operators $operators, $data)
    {
        $operators->setLogin($data->login);
        $operators->setPassword($data->password);
        $operators->setEmail($data->email);
        $operators->setPhone($data->phone);
        $operators->setFirstName($data->first_name);
        $operators->setMiddleName($data->middle_name);
        $operators->setLastName($data->last_name);
        $operators->setGender($data->gender);
        $operators->setRegistrationDate(new DateTime);
        $this->_em->persist($operators);
        $this->_em->flush();
    }

    public function getAllOperators()
    {
        return $this->_em->createQueryBuilder()
            ->select('users')
            ->from($this->_entityName, 'users')
            ->getQuery()
            ->getArrayResult();
    }

} 