<?php namespace sasin91\LaravelTrinityCoreInteractions\Tests;

use Sasin91\LaravelTrinityCoreInteractions\Expansion;
use Sasin91\LaravelTrinityCoreInteractions\Interactions\Soap;
use Sasin91\LaravelTrinityCoreInteractions\TrinityCore;

use Illuminate\Support\Str;

/**
 * Class AccountTest
 * @group SOAP
 *
 * @TODO: Split into smaller more meaningful tests.
 */
class AccountTest extends \TestCase
{
    protected $credentials = [
        'account'   =>  'testAccount',
        'password'  =>  'secret'
    ];

    /** @test */
    public function can_create_an_account()
    {
        $response = TrinityCore::call(Soap\CreateAccountContract::class, $this->credentials);

        $this->assertContains("Account created: {$this->credentials['account']}", $response);
    }

    /**
     * @test
     *
     * This should be the administrative action for forcing a password change.
     * additionally, this could be called when password is reset on web, to keep them in sync.
     */
    public function can_set_password_for_a_account()
    {
        $response = TrinityCore::call(Soap\Account\SetAccountPasswordContract::class, [
            $this->credentials['account'],
            'newPassword',
            'newPassword'
        ]);

        $this->assertContains("The password was changed", $response);
    }

    /** @test */
    public function can_set_an_expansion_on_account()
    {
        $response = TrinityCore::call(Soap\Account\SetAccountExpansionContract::class, [
            $this->credentials['account'],
            $expansion = Expansion::WOTLK
        ]);

        $this->assertContains("{$expansion} expansion allowed now.", $response);
    }

    /** @test */
    public function can_set_gm_level_on_a_account()
    {
        $response = TrinityCore::call(Soap\Account\SetGMLevelContract::class, [
            'account' => $this->credentials['account'],
            'level'   => 3,
            'realm'   => -1
        ]);

        $account = Str::upper($this->credentials['account']);
        $this->assertContains("You change security level of account {$account} to 3.", $response);
    }

    /** @test */
    public function can_delete_an_account()
    {
        $response = TrinityCore::call(Soap\Account\DeleteAccountContract::class, $this->credentials);

        // TrinityCore stores accounts in uppercase, therefor that's what's returned.
        $account = Str::upper($this->credentials['account']);
        $this->assertContains("deleted: {$account}", $response);
    }
}
