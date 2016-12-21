<?php
/**
 * LoginURL Action
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\UrlProcessor\Controller\Pages;

class LoginURL extends \Magento\Framework\App\Action\Action
{

    /**
     * @inheritdoc
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}