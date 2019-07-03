<?php
/**
 * Created by PhpStorm.
 * User: uho0613
 * Date: 02.07.19
 * Time: 22:48
 */

namespace SysPerson\Practic\Observer;

use SysPerson\Practic\Api\MyObserverInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Catalog\Model\Layer\Resolver;
class MyObserver extends AbstractCollection implements MyObserverInterface
{

    protected $_registry;
    protected $layerResolver;
    public function __construct(Resolver $resolve){
        $this->layerResolver = $resolve;

    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $collection = $observer->getCollection();
        $category = $this->layerResolver->get()->getCurrentCategory();
        if($category->getId() == 4) {
            $collection = $collection->addAttributeToSelect('*');
            $collection->joinField(
                'qty', 'cataloginventory_stock_item', 'qty', 'product_id=entity_id', '{{table}}.stock_id=1', 'left'
            );
            $collection->addAttributeToFilter('qty', ['gt' => 100])->load();
        }

    }


}