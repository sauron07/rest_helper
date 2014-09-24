<?php

namespace Application\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Zend\Crypt\Password\Bcrypt;

/**
 * Operators
 *
 * @ORM\Table(name="operators")
 * @ORM\Entity(repositoryClass="Application\Repository\Operator")
 */
class Operators
{
    const ENTITY_NAME = 'Application\Entity\Operators';

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
     * @ORM\Column(name="login", type="string", length=255, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="password_salt", type="string", length=32, nullable=true)
     */
    private $passwordSalt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer", nullable=true)
     */
    private $phone;

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
     * @ORM\Column(name="gender", type="integer", nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="online_status", type="string", length=1, nullable=true)
     */
    private $onlineStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="last_visit_id", type="integer", nullable=true)
     */
    private $lastVisitId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registration_date", type="date", nullable=true)
     */
    private $registrationDate;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getLastVisitId()
    {
        return $this->lastVisitId;
    }

    /**
     * @param int $lastVisitId
     */
    public function setLastVisitId($lastVisitId)
    {
        $this->lastVisitId = $lastVisitId;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getOnlineStatus()
    {
        return $this->onlineStatus;
    }

    /**
     * @param string $onlineStatus
     */
    public function setOnlineStatus($onlineStatus)
    {
        $this->onlineStatus = $onlineStatus;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $this::hashPassword($this, $password, true);
    }

    /**
     * @param $generateSalt
     * @return string
     */
    public function getPasswordSalt($generateSalt)
    {
        if($generateSalt){
            return $this->setPasswordSalt(md5(uniqid()));
        }
        return $this->passwordSalt;
    }

    /**
     * @param string $passwordSalt
     * @return $this
     */
    public function setPasswordSalt($passwordSalt)
    {
        $this->passwordSalt = $passwordSalt;
        return $this->passwordSalt;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return DateTime
     */
    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }

    /**
     * @param DateTime $registrationDate
     */
    public function setRegistrationDate($registrationDate)
    {
        $this->registrationDate = $registrationDate;
    }

    public function hashPassword(Operators $operators, $password, $generateSalt = false)
    {
        $salt = $operators->getPasswordSalt($generateSalt);
        $bcrypt = new Bcrypt(['salt' => $salt, 'cost' => 4]);
        return $bcrypt->create($password, $salt);
    }

    public function toArray()
    {
        $array = [];
        foreach ($this as $key => $value){
            if(!in_array($key, ['password', 'passwordSalt']))
                $array[$key] = $value;
        }
        return $array;
    }
}