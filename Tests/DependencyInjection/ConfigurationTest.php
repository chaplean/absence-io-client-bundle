<?php

namespace Tests\Chaplean\Bundle\SorClientBundle\DependencyInjection;

use Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\ChapleanAbsenceIoClientExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ConfigurationTest.
 *
 * @package   Tests\Chaplean\Bundle\SorClientBundle\DependencyInjection
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ConfigurationTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\Configuration::getConfigTreeBuilder()
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\Configuration::addApiConfiguration()
     *
     * @return void
     */
    public function testFullyDefinedConfig()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanAbsenceIoClientExtension();
        $loader->load([['api' => ['url' => 'url', 'access_token' => 'token']]], $container);

        $this->assertEquals('url', $container->getParameter('chaplean_absence_io_client.api.url'));
        $this->assertEquals('token', $container->getParameter('chaplean_absence_io_client.api.access_token'));
    }

    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\Configuration::getConfigTreeBuilder()
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\Configuration::addApiConfiguration()
     *
     * @return void
     */
    public function testDefaultConfig()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanAbsenceIoClientExtension();
        $loader->load([[]], $container);

        $this->assertEquals('https://app.absence.io/api/v2/', $container->getParameter('chaplean_absence_io_client.api.url'));
        $this->assertEquals('%chaplean_absence_io_client.access_token%', $container->getParameter('chaplean_absence_io_client.api.access_token'));
    }
}
