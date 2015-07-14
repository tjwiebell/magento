<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Api\Search;

use Magento\Framework\Api\SearchCriteriaInterface as BaseSearchCriteriaInterface;

interface SearchCriteriaInterface extends BaseSearchCriteriaInterface
{
    /**
     * @return string
     */
    public function getSearchTerm();

    /**
     * @param string $searchTerm
     * @return $this
     */
    public function setSearchTerm($searchTerm);

    /**
     * @return string
     */
    public function getRequestName();

    /**
     * @param string $requestName
     * @return $this
     */
    public function setRequestName($requestName);
}