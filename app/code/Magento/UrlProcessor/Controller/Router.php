<?php
/**
 * Front controller responsible for special handling of /custom frontname
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\UrlProcessor\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

class Router implements RouterInterface
{
    /**
     * @var array $pageMapping
     */
    protected $supportedPageIds;

    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * List of required request parameters
     * Order sensitive
     * @var string[]
     */
    protected $_requiredParams = ['frontName', 'actionID'];

    /**
     * Router constructor.
     * @param ActionFactory $actionFactory
     * @param array $supportedPageIds
     */
    public function __construct(ActionFactory $actionFactory, array $supportedPageIds)
    {
        $this->supportedPageIds = $supportedPageIds;
        $this->actionFactory = $actionFactory;
    }

    /**
     * Match application action by request. If path doesn't begin with custom/ return null to continue router cycle.
     * If ID is not in supported list, continue with router cycle. Matched IDs will be forwarded to correct action.
     *
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        $params = $this->parseRequest($request);

        if (!isset($params['frontName']) || !isset($params['actionID'])) {
            return null;
        }

        if ($params['frontName'] !== 'custom' || !array_key_exists($params['actionID'], $this->supportedPageIds)) {
            return null;
        }

        $request->setPathInfo($this->supportedPageIds[$params['actionID']]);
        return $this->actionFactory->create('Magento\Framework\App\Action\Forward', [
            'request' => $request
        ]);
    }

    /**
     * Parse frontName and actionID from path info
     *
     * @param RequestInterface $request
     * @return array
     */
    protected function parseRequest(RequestInterface $request)
    {
        $output = [];

        $path = trim($request->getPathInfo(), '/');

        $params = explode('/', $path);
        foreach ($this->_requiredParams as $paramName) {
            $output[$paramName] = array_shift($params);
        }

        return $output;
    }
}
