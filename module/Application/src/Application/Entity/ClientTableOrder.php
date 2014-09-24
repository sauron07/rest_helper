<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClientTableOrder
 *
 * @ORM\Table(name="client_table_order")
 * @ORM\Entity
 */
class ClientTableOrder
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
     * @var integer
     *
     * @ORM\Column(name="operator_id", type="integer", nullable=true)
     */
    private $operatorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="number_of_persons", type="integer", nullable=true)
     */
    private $numberOfPersons;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_id", type="integer", nullable=true)
     */
    private $orderId;


}
