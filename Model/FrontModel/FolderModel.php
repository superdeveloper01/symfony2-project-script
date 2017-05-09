<?php


namespace SystemMessage\MessageBundle\Model\FrontModel;

use Symfony\Component\Security\Core\User\UserInterface;

use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;

use SystemMessage\MessageBundle\Entity\Folder;

class FolderModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Entity\Folder
     */
    public function createFolder()
    {
        return $this->getManager()->createFolder();
    }

    /**
     *
     * @access public
     * @param  int                                          $userId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllFoldersForUserById($userId)
    {
        return $this->getRepository()->findAllFoldersForUserById($userId);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Folder                         $folder
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\FolderManager
     */
    public function saveFolder(Folder $folder)
    {
        return $this->getManager()->saveFolder($folder);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Folder                         $folder
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\FolderManager
     */
    public function updateFolder(Folder $folder)
    {
        return $this->getManager()->updateFolder($folder);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface              $user
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\FolderManager
     */
    public function setupDefaults(UserInterface $user)
    {
        return $this->getManager()->setupDefaults($user);
    }
}
