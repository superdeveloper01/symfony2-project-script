<?php

namespace SystemMessage\MessageBundle\Model\FrontModel;

use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;

use SystemMessage\MessageBundle\Entity\Message;

class MessageModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Entity\Message
     */
    public function createMessage()
    {
        return $this->getManager()->createMessage();
    }

    /**
     *
     * @access public
     * @param  int                                       $messageId
     * @return \SystemMessage\MessageBundle\Entity\Message
     */
    public function getAllEnvelopesForMessageById($messageId)
    {
        return $this->getRepository()->getAllEnvelopesForMessageById($messageId);
    }

    /**
     *
     * @access public
     * @param  \SystemMessage\MessageBundle\Entity\Message                         $message
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\MessageManager
     */
    public function saveMessage(Message $message)
    {
        return $this->getManager()->saveMessage($message);
    }
}
