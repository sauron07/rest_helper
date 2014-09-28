<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 17.09.14
 * Time: 21:07
 */

namespace Application\Controller;


use Application\Service\Traits\AngularPostDataTrait;
use Application\Service\UserService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Session\SessionManager;
use Zend\View\Model\JsonModel;

class UserController extends AbstractActionController
{
    use AngularPostDataTrait;
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @param MvcEvent $e
     * @return mixed|void
     */
    public function onDispatch(MvcEvent $e)
    {
        $this->service = $this->getServiceLocator()->get('UserService');
        parent::onDispatch($e);
    }


    /**
     * @return JsonModel
     */
    public function loginAction()
    {
        if($this->identity()){
            return new JsonModel(['success' => false, 'message' => 'You are all ready logged on']);
        }else{
            $data = $this->getPostData();
            $result = $this->service->login($data);
            return new JsonModel(['result' => $result]);
        }
    }

    /**
     * @return JsonModel
     */
    public function logoutAction()
    {
        $this->service->logout();
        return new JsonModel(['success' => true]);
    }

    /**
     * @return JsonModel
     */
    public function registrationAction()
    {
        $data = $this->getPostData();
        $this->service->registerOperator($data);
        return new JsonModel(['success' => true]);
    }
}