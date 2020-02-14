<?php
namespace Intesols\Distributor\Controller\Adminhtml\Grid;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Intesols\Distributor\Model\Resource\Distributor\CollectionFactory;
 
class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * Massactions filter.
     *
     * @var Filter
     */
    protected $_filter;
 
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;
 
    /**
     * @param Context           $context
     * @param Filter            $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) 
    {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
 
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $recordDeleted = 0;
        foreach ($collection->getItems() as $auctionProduct) {
            $auctionProduct->setId($auctionProduct->getEntityId());
            $auctionProduct->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(
            __('A total of %1 record(s) have been deleted.', $recordDeleted)
        );
 
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/');
    }
 
    /**
     * Check delete Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Intesols_Distributor::row_data_delete');
    }
}