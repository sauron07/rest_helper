<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatorsGroup
 *
 * @ORM\Table(name="operators_group")
 * @ORM\Entity
 */
class OperatorsGroup
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


}
