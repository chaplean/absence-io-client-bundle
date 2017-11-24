<?php

namespace Tests\Chaplean\Bundle\SorClientBundle\DependencyInjection;

use Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\ChapleanAbsenceIoClientExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ChapleanAbsenceIoClientExtensionTest.
 *
 * @package   Tests\Chaplean\Bundle\SorClientBundle\DependencyInjection
 * @author    Matthias - Chaplean <matthias@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class ChapleanAbsenceIoClientExtensionTest extends TestCase
{
    /**
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\ChapleanAbsenceIoClientExtension::load()
     * @covers \Chaplean\Bundle\AbsenceIoClientBundle\DependencyInjection\ChapleanAbsenceIoClientExtension::setParameters()
     *
     * @return void
     */
    public function testConfigIsLoadedInParameters()
    {
        $container = new ContainerBuilder();
        $loader = new ChapleanAbsenceIoClientExtension();
        $loader->load([['api' => ['url' => 'url', 'hawk_id' => 'hawk_id', 'hawk_key' => 'hawk_key']]], $container);

        $this->assertEquals('url', $container->getParameter('chaplean_absence_io_client.api.url'));
        $this->assertEquals('hawk_id', $container->getParameter('chaplean_absence_io_client.api.hawk_id'));
        $this->assertEquals('hawk_key', $container->getParameter('chaplean_absence_io_client.api.hawk_key'));
    }
}
