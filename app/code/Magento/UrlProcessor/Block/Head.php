<?php
/**
 * Head
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\UrlProcessor\Block;

use Magento\Framework\View\Element\Template;

class Head extends Template
{
    /**
     * Prepare layout method. Retrieves the page title block and sets the page title to
     * the argument passed in the request.
     *
     * @return Template $this
     */
    protected function _prepareLayout()
    {
        /** @var Template|null $titleBlock */
        $titleBlock = $this->getLayout()->getBlock('page.main.title');
        if ($titleBlock) {
            $titleBlock->setPageTitle($this->getRequest()->getParam('title'));
        }

        return $this;
    }
}
