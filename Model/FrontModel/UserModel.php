<?php

namespace SystemMessage\MessageBundle\Model\FrontModel;

use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;

class UserModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @param  int                                                 $userId
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function findOneUserById($userId)
    {
        return $this->getRepository()->findOneUserById($userId);
    }

    /**
     *
     * @access public
     * @param  array                                        $usernames
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findTheseUsersByUsername(array $usernames = array())
    {
        return $this->getRepository()->findTheseUsersByUsername($usernames);
    }
}