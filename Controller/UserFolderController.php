<?php

namespace SystemMessage\MessageBundle\Controller;

use SystemMessage\MessageBundle\Controller\UserFolderBaseController;

class UserFolderController extends UserFolderBaseController
{
    /**
     *
     * @access protected
     * @param  string         $folderName
     * @return RenderResponse
     */
    public function showFolderByNameAction($folderName)
    {
        $this->isAuthorised('ROLE_USER');
        $folders = $this->getFolderHelper()->findAllFoldersForUserById($this->getUser());
        $this->isFound($currentFolder = $this->getFolderHelper()->filterFolderByName($folders, $folderName));
        $messagesPager = $this->getEnvelopeModel()->findAllEnvelopesForFolderByIdPaginated($currentFolder->getId(), $this->getUser()->getId(), $this->getQuery('page', 1), 25);

        return $this->renderResponse('SystemMessageMessageBundle:User:Folder/show.html.', array(
            'crumbs' => $this->getCrumbs()->addUserFolderShow($currentFolder),
            'folders' => $folders,
            'current_folder' => $currentFolder,
            'pager' => $messagesPager,
        ));
    }

    /**
     *
     * @access public
     * @param  string           $folderName
     * @return RedirectResponse
     */
    public function folderBulkAction($folderName)
    {
        $this->isAuthorised('ROLE_USER');

        $this->bulkAction();

        return $this->redirectResponse($this->path('webshop_message_message_user_folder_show', array('folderName' => $folderName)));
    }
}
