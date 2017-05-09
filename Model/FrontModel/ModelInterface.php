<?php

namespace SystemMessage\MessageBundle\Model\FrontModel;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use SystemMessage\MessageBundle\Model\Component\Manager\ManagerInterface;
use SystemMessage\MessageBundle\Model\Component\Repository\RepositoryInterface;

interface ModelInterface
{
    /**
     *
     * @access public
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface               $dispatcher
     * @param \SystemMessage\MessageBundle\Model\Component\Repository\RepositoryInterface $repository
     * @param \SystemMessage\MessageBundle\Model\Component\Manager\ManagerInterface       $manager
     */
    public function __construct(EventDispatcherInterface $dispatcher, RepositoryInterface $repository, ManagerInterface $manager);

    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Model\Component\Repository\RepositoryInterface
     */
    public function getRepository();

    /**
     *
     * @access public
     * @return \SystemMessage\MessageBundle\Model\Component\Manager\ManagerInterface
     */
    public function getManager();
}
