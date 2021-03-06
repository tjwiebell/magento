<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Framework\Pricing;

/**
 * Interface SaleableInterface
 *
 * @api
 */
interface SaleableInterface
{
    /**
     * Returns PriceInfo container of saleable item
     *
     * @return \Magento\Framework\Pricing\PriceInfoInterface
     */
    public function getPriceInfo();

    /**
     * Returns type identifier of saleable item
     *
     * @return array|string
     */
    public function getTypeId();

    /**
     * Returns identifier of saleable item
     *
     * @return int
     */
    public function getId();

    /**
     * Returns quantity of saleable item
     *
     * @return float
     */
    public function getQty();
}
