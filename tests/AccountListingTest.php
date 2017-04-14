<?php

namespace Sasin91\LaravelTrinityCoreInteractions\Tests;

use Sasin91\LaravelTrinityCoreInteractions\Facades\TrinityCore;
use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap\Account\OnlineListContract;

/**
 * Class AccountListingTest
 * @package sasin91\LaravelTrinityCoreInteractions\Tests
 * @group  SOAP
 */
class AccountListingTest extends TestCase
{
    /** @test */
    public function it_can_list_all_online_accounts()
    {
        $this->assertEquals("No online players.", TrinityCore::soap("account onlinelist"));
    }

    /** @test */
    public function the_result_are_equal_to_each_other()
    {
        $this->assertEquals(TrinityCore::call(OnlineListContract::class), TrinityCore::soap("account onlinelist"));
    }
}