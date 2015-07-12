<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\ProportionsCacheBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\ProportionsCacheBehavior Test Case
 */
class ProportionsCacheBehaviorTest extends TestCase
{

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ProportionsCache = new ProportionsCacheBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProportionsCache);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
