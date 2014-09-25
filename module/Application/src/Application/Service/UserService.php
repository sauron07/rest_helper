<?php

namespace Application\Service;

use Application\Entity\Operators;
use Application\Service\EntityManager\EntityManagerAwareInterface;
use Application\Service\EntityManager\EntityManagerAwareTrait;
use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Zend\Authentication\AuthenticationService;
use Zend\Session\SessionManager;
use Zend\Authentication\Result;

/**
 * Class UserService
 * @package Application\Service
 */
class UserService implements EntityManagerAwareInterface
{
    use EntityManagerAwareTrait;

    /**
     * @var AuthenticationService
     */
    protected $authService;

    /**
     * @var SessionManager
     */
    protected $sessionManager;

    protected $sessionId;

    /**
     * @param AuthenticationService $authService
     * @param SessionManager $sessionManager
     */
    public function __construct(AuthenticationService $authService, SessionManager $sessionManager)
    {
        $this->authService = $authService;
        $this->sessionManager = $sessionManager;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function login($data)
    {
        /** @var ObjectRepository $adapter */
        $adapter = $this->authService->getAdapter();
        $adapter->setIdentityValue($data->login);
        $adapter->setCredentialValue($data->password);

        $result = $adapter->authenticate();

        switch ($result->getCode()){
            case (Result::SUCCESS):
                $identity = $result->getIdentity();
                $this->authService->getStorage()->write($identity);

                if(isset($data->rememberMe)){
                    $this->sessionManager->rememberMe(1209600);
                }

                $toJson['user'] = $identity->toArray();
                $toJson['session_id'] = $this->sessionManager->getId();
                $toJson['success'] = true;
                return json_decode(json_encode($toJson));
            case (Result::FAILURE_IDENTITY_NOT_FOUND):
                return ['success' => false, 'message' => 'User not found.'];
            case (Result::FAILURE_CREDENTIAL_INVALID):
                return (['success' => false, 'message' => 'Invalid password']);
            default:
                return (['success' => false, 'message' => 'Error while login']);
        }
    }

    public function logout()
    {
        if($this->authService->hasIdentity()){
            $this->authService->clearIdentity();
            $this->sessionManager->forgetMe();
        }

    }

    /**
     * @param $data
     */
    public function registerOperator($data)
    {
        $operators = new Operators();
        $this->getUserRepository()->registration($operators, $data);
    }

    /**
     * @return bool|mixed $sessionId
     */
    public function getSessionId()
    {
        if($this->sessionManager->sessionExists()){
            return $this->sessionId;
        }
        return false;
    }

    /**
     * @return \Application\Repository\Operator
     */
    protected function getUserRepository()
    {
        return $this->getEntityManager()->getRepository(Operators::ENTITY_NAME);
    }
}