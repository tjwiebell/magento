<?php
/**
 * PrivacyPolicy Action
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\UrlProcessor\Controller\Pages;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class PrivacyPolicy extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory $pageFactory
     */
    protected $pageFactory;

    /**
     * PrivacyPolicy constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     */
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * Execute method
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->pageFactory->create();
    }
}