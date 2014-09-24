<?php
/**
 * Created by PhpStorm.
 * User: matveev
 * Date: 19.09.14
 * Time: 10:37
 */

namespace Application\Service\Traits;


trait AngularPostDataTrait
{
    public function getPostData()
    {
        return json_decode(file_get_contents("php://input"));
    }
}