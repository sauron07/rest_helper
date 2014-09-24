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

class UserController extends AbstractActionController
{
    use AngularPostDataTrait;
    /**
     * @var UserService
     */
    protected $service;

    public function onDispatch(MvcEvent $e)
    {
        $this->service = $this->getServiceLocator()->get('UserService');
        parent::onDispatch($e);
    }


    public function loginAction()
    {
        $data = $this->getPostData();
        $this->service->loginAction($data);
        die('controller');

    }
}