<?php

namespace SystemMessage\MessageBundle\Controller;

use SystemMessage\MessageBundle\Controller\BaseController;
use SystemMessage\MessageBundle\Entity\Envelope;

class UserMessageBaseController extends BaseController
{
    /**
     *
     * @access protected
     * @param  int                                                        $userId
     * @return \SystemMessage\MessageBundle\Form\Handler\MessageFormHandler
     */
    protected function getFormHandlerToSendMessage($userId = null)
    {
        $formHandler = $this->container->get('webshop_message_message.form.handler.message');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param \SystemMessage\MessageBundle\Entity\Envelope
     * @param  int                                                             $userId
     * @return \SystemMessage\MessageBundle\Form\Handler\MessageReplyFormHandler
     */
    protected function getFormHandlerToReplyToMessage(Envelope $inResponseEnvelope, $userId = null)
    {
        $formHandler = $this->container->get('webshop_message_message.form.handler.message_reply');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        $formHandler->setInResponseToMessage($inResponseEnvelope->getMessage());

        return $formHandler;
    }

    /**
     *
     * @access protected
     * @param \SystemMessage\MessageBundle\Entity\Envelope
     * @param  int                                                               $userId
     * @return \SystemMessage\MessageBundle\Form\Handler\MessageForwardFormHandler
     */
    protected function getFormHandlerToForwardMessage(Envelope $envelopeToForward, $userId = null)
    {
        $formHandler = $this->container->get('webshop_message_message.form.handler.message_forward');
        $formHandler->setRequest($this->getRequest());

        $formHandler->setSender($this->getUser());

        // Are we sending this to someone who's 'send message' button we clicked?
        if (null != $userId) {
            $sendToUser = $this->getUserModel()->findOneUserById($userId);

            $formHandler->setRecipient($sendToUser);
        }

        $formHandler->setMessageToForward($envelopeToForward->getMessage());

        return $formHandler;
    }
}
