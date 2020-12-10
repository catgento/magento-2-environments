<?php
/**
 *
 * @package     Brildor_Theme
 * @author      Pau Iranzo
 * @license     https://opensource.org/licenses/OSL-3.0 Open Software License v. 3.0 (OSL-3.0)
 * @link        https://catgento.com
 */

namespace Catgento\Environments\Block;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Environment extends Template implements \Magento\Widget\Block\BlockInterface
{
    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    /**
     * Whatsapp constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param Template\Context $context
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Template\Context $context
    ) {
        $this->scopeConfig = $scopeConfig;

        parent::__construct($context);
    }

    /**
     * Returns the value of a config path
     * @param $field
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getConfigValue($field)
    {
        return $this->scopeConfig->getValue(
            $field,
            ScopeInterface::SCOPE_STORE,
            $this->getStoreId()
        );
    }

    /**
     * Sets main environment color and text
     *
     * @throws NoSuchEntityException
     */
    public function getEnvironmentVars()
    {
        $baseUrl = $this->getConfigValue('web/secure/base_url');
        $productionUrl = $this->getConfigValue('system/environment/production_url');
        $stagingUrl = $this->getConfigValue('system/environment/staging_url');
        $devUrl = $this->getConfigValue('system/environment/development_url');

        switch ($baseUrl) {
            case $productionUrl:
                $color = $this->getConfigValue('system/environment/production_color');
                $text = __('Production');
                break;
            case $stagingUrl:
                $color = $this->getConfigValue('system/environment/staging_color');
                $text = __('Staging');
                break;
            case $devUrl:
                $color = $this->getConfigValue('system/environment/development_color');
                $text = __('Development');
                break;
            default:
                $color = '#f8f8f8';
                $text = $baseUrl;
                break;
        }

        $environment['color'] = $color;
        $environment['text'] = $text;

        return $environment;
    }

    /**
     * @return string
     */
    public function getBackgroundColor(): string
    {
        return $this->envcolor;
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->envtext;
    }
}
