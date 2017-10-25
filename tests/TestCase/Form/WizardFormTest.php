<?php
namespace App\Test\TestCase\Form;

use App\Form\WizardForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\WizardForm Test Case
 */
class WizardFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\WizardForm
     */
    public $Wizard;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Wizard = new WizardForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wizard);

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
