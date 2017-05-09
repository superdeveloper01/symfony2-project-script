<?php

namespace SystemMessage\MessageBundle\Model\FrontModel;

use Symfony\Component\Security\Core\User\UserInterface;

use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;

use SystemMessage\MessageBundle\Entity\Folder;
use SystemMessage\MessageBundle\Entity\Envelope;

class EnvelopeModel extends BaseModel implements ModelInterface
{
    const MESSAGE_SEND = 0;
    const MESSAGE_SAVE_CARBON_COPY = 1;
    const MESSAGE_SAVE_DRAFT = 2;

    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Entity\Envelope
     */
    public function createEnvelope()
    {
        return $this->getManager()->createEnvelope();
    }

    /**
     *
     * @access public
     * @param  int                                        $envelopeId
     * @param  int                                        $userId
     * @return \SystemMessage\MessageBundle\Entity\Envelope
     */
    public function findEnvelopeByIdForUser($envelopeId, $userId)
    {
        return $this->getRepository()->findEnvelopeByIdForUser($envelopeId, $userId);
    }

    /**
     *
     * @access public
     * @param  int                                                      $folderId
     * @param  int                                                      $userId
     * @param  int                                                      $page
     * @return \Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination
     */
    public function findAllEnvelopesForFolderByIdPaginated($folderId, $userId, $page, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllEnvelopesForFolderByIdPaginated($folderId, $userId, $page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  int                                          $envelopeId
     * @param  int                                          $userId
     * @return \Doctrine\Common\Collections\ArrayCollection
     *
     */
    public function findTheseEnvelopesByIdAndByUserId($envelopeIds, $userId)
    {
        return $this->getRepository()->findTheseEnvelopesByIdAndByUserId($envelopeIds, $userId);
    }

    /**
     *
     * @access public
     * @param  int   $folderId
     * @param  int   $userId
     * @return array
     */
    public function getReadCounterForFolderById($folderId, $userId)
    {
        return $this->getRepository()->getReadCounterForFolderById($folderId, $userId);
    }

    /**
     *
     * @access public
     * @param  int   $folderId
     * @param  int   $userId
     * @return array
     */
    public function getUnreadCounterForFolderById($folderId, $userId)
    {
        return $this->getRepository()->getUnreadCounterForFolderById($folderId, $userId);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Envelope
     */
    public function saveEnvelope(Envelope $envelope)
    {
        return $this->getManager()->saveEnvelope($envelope);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Envelope                         $envelope
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function markAsRead(Envelope $envelope)
    {
        return $this->getManager()->markAsRead($envelope);
    }

    /**
     *
     * @access public
     * @param  array                                                              $envelopes
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function bulkMarkAsRead($envelopes)
    {
        return $this->getManager()->bulkMarkAsRead($envelopes);
    }

    /**
     *
     * @access public
     * @param  Envelope                                                           $envelope
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function markAsUnread(Envelope $envelope)
    {
        return $this->getManager()->markAsUnread($envelope);
    }

    /**
     *
     * @access public
     * @param  array                                                              $envelopes
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function bulkMarkAsUnread($envelopes)
    {
        return $this->getManager()->bulkMarkAsUnread($envelopes);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Envelope                         $envelope
     * @param  array                                                              $folders
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function delete(Envelope $envelope, $folders)
    {
        return $this->getManager()->delete($envelope, $folders);
    }

    /**
     *
     * @access public
     * @param  array                                                              $envelopes
     * @param  array                                                              $folders
     * @param  \Symfony\Component\Security\Core\User\UserInterfaces               $user
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function bulkDelete($envelopes, $folders, UserInterface $user)
    {
        return $this->getManager()->bulkDelete($envelopes, $folders, $user);
    }

    /**
     *
     * @access public
     * @param  array                                                              $envelopes
     * @param  \SystemMessage\MessageBundle\Entity\Folder                           $moveTo
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\EnvelopeManager
     */
    public function bulkMoveToFolder($envelopes, Folder $moveTo)
    {
        return $this->getManager()->bulkMoveToFolder($envelopes, $moveTo);
    }
}
