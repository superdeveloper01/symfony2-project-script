<?php

namespace SystemMessage\MessageBundle\Model\FrontModel;

use SystemMessage\MessageBundle\Model\FrontModel\BaseModel;
use SystemMessage\MessageBundle\Model\FrontModel\ModelInterface;

class ThreadModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Entity\Thread
     */
    public function createThread()
    {
        return $this->getManager()->createThread();
    }

    /**
     *
     * @access public
     * @param  int                                        $envelopeId
     * @param  int                                        $userId
     * @return \SystemMessage\MessageBundle\Entity\Envelope
     */
    public function findThreadWithAllEnvelopesByThreadIdAndUserId($threadId, $userId)
    {
        return $this->getRepository()->findThreadWithAllEnvelopesByThreadIdAndUserId($threadId, $userId);
    }
}