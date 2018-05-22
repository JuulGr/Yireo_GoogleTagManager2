<?php
/**
 * GoogleTagManager2 plugin for Magento
 *
 * @package     Yireo_GoogleTagManager2
 * @author      Yireo (https://www.yireo.com/)
 * @copyright   Copyright 2017 Yireo (https://www.yireo.com/)
 * @license     Open Source License
 */

namespace Yireo\GoogleTagManager2\Test\Unit\Block;

use Yireo\GoogleTagManager2\Block\Generic;

/**
 * Class GenericTest
 *
 * @package Yireo\GoogleTagManager2\Test\Unit\Block
 */
class GenericTest extends \Yireo\GoogleTagManager2\Test\Unit\Generic
{
    /**
     * @var Generic
     */
    protected $target;

    /**
     * Setup method
     */
    protected function setUp()
    {
        parent::setUp();

        $this->target = $this->objectManager->get(Generic::class);
    }

    /**
     * @test
     * @covers Generic::isEnabled
     */
    public function testIsEnabled()
    {
        $this->assertEquals($this->target->isEnabled(), (bool)$this->getConfigValue('enabled'));
    }

    /**
     * @test
     * @covers Generic::isDebug
     */
    public function testIsDebug()
    {
        $this->assertEquals($this->target->isDebug(), (bool)$this->getConfigValue('debug'));
    }

    /**
     * @test
     * @covers Generic::addAttribute
     */
    public function testAddAttribute()
    {
        $this->target->addAttribute('foo', 'bar');
        $this->assertEquals($this->target->getAttributes(), array('foo' => 'bar'));
        $this->assertCount(1, $this->target->getAttributes());
    }

    /**
     * @test
     * @covers Generic::getAttributesAsJson
     */
    public function testGetAttributesAsJson()
    {
        $data = array('foo' => 'bar');
        $this->target->addAttribute('foo', 'bar');
        $this->assertJsonStringEqualsJsonString($this->target->getAttributesAsJson(), json_encode($data));
    }

    /**
     * @test
     * @covers Generic::getWebsiteName
     */
    /*public function testGetWebsiteName()
    {
        $scopeConfig = $this->getScopeConfig();
        $scopeConfig->setData('general/store_information/name', 'Test Website');
        $this->assertNotEmpty($this->target->getWebsiteName());
    }*/
}