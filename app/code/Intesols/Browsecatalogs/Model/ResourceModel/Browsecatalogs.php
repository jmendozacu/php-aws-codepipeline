<?php
/**
 * @category   Intesols
 * @package    Intesols_Browsecatalogs
 * @author     jaimin.patel@intesols.com.au
 * @copyright  This file was generated by using Module Creator(http://code.vky.co.in/magento-2-module-creator/) provided by VKY <viky.031290@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Intesols\Browsecatalogs\Model\ResourceModel;

class Browsecatalogs extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('intesols_browsecatalogs', 'browsecatalogs_id');   //here "intesols_browsecatalogs" is table name and "browsecatalogs_id" is the primary key of custom table
    }
}