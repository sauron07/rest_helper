<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LastVisit
 *
 * @ORM\Table(name="last_visit")
 * @ORM\Entity
 */
class LastVisit
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
     * @var \DateTime
     *
     * @ORM\Column(name="login_tyme", type="date", nullable=true)
     */
    private $loginTyme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logout_time", type="date", nullable=true)
     */
    private $logoutTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="total_time", type="integer", nullable=true)
     */
    private $totalTime;


}
