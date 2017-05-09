<?php
namespace SystemMessage\MessageBundle\Model\FrontModel;

use Symfony\Component\Security\Core\User\UserInterface;
use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;
use SystemMessage\MessageBundle\Entity\Registry;

class RegistryModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Entity\Registry
     */
    public function createRegistry()
    {
        return $this->getManager()->createRegistry();
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface $user
     * @return \SystemMessage\MessageBundle\Entity\Registry
     */
    public function findOrCreateOneRegistryForUser(UserInterface $user)
    {
        $registry = $this->findOneRegistryForUserById($user->getId());

        if (! $registry) {
            $registry = $this->setupDefaults($user);
        }

        return $registry;
    }

    /**
     *
     * @access public
     * @param  int                                        $userId
     * @return \SystemMessage\MessageBundle\Entity\Registry
     */
    public function findOneRegistryForUserById($userId)
    {
        return $this->getRepository()->findOneRegistryForUserById($userId);
    }

    public function updateRegistry(Registry $registry)
    {
        $this->getManager()->updateRegistry($registry);

        return $registry;
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface $user
     * @return \SystemMessage\MessageBundle\Entity\Registry
     */
    public function setupDefaults(UserInterface $user)
    {
        return $this->getManager()->setupDefaults($user);
    }
}
