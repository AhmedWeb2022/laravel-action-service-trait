<?php

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\Concerns\InteractsWithConsole;
use Tests\CreatesApplication;

/**
 * @property \Illuminate\Contracts\Container\Container $app
 */
class TraitTests extends TestCase
{
    use CreatesApplication, InteractsWithConsole;

    protected $app;

    public function setUp(): void
    {
        parent::setUp();
        $this->app = require __DIR__ . '/../../bootstrap/app.php';
    }

    /**
     * @return void
     */
    public function test_make_trait_command(): void
    {
        $this->artisan('make:trait TestTrait')->assertSuccessful();
    }

    /**
     * @return void
     */
    public function test_trait_stub_exist(): void
    {
        $this->assertFileExists(__DIR__ . '/../src/Stubs/trait.stub');
    }
}
