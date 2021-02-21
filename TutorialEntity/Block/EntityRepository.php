<?php
namespace Perspective\TutorialEntity\Block;
class EntityRepository extends \Magento\Framework\View\Element\Template
{
    protected $_productRepository;
    protected $_productImageHelper;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Catalog\Helper\Image $productImageHelper,
        array $data = []
    )
    {
        $this->_productRepository = $productRepository;
        $this->_productImageHelper= $productImageHelper;
        parent::__construct($context, $data);
    }

    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }


    /**
     * Retrieve image width
     *
     * @return int|null
     */
    public function getImageOriginalWidth($product, $imageId, $attributes = [])
    {
        return $this->_productImageHelper->init($product, $imageId, $attributes)->getWidth();
    }

    /**
     * Retrieve image height
     *
     * @return int|null
     */
    public function getImageOriginalHeight($product, $imageId, $attributes = [])
    {
        return $this->_productImageHelper->init($product, $imageId, $attributes)->getHeight();
    }
}
?>
