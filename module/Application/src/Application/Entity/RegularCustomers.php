<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegularCustomers
 *
 * @ORM\Table(name="regular_customers")
 * @ORM\Entity
 */
class RegularCustomers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_visit_id", type="integer", nullable=true)
     */
    private $lastVisitId;

    /**
     * @var integer
     *
     * @ORM\Column(name="count_visits", type="integer", nullable=true)
     */
    private $countVisits;


}
