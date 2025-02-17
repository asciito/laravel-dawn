<?php

namespace Asciito\LaravelDawn\Tests;

use Asciito\LaravelDawn\Concerns\ProvidesBrowser;
use Mockery as m;
use PHPUnit\Framework\TestCase;
use stdClass;

class ProvidesBrowserTest extends TestCase
{
    use ProvidesBrowser;

    protected function tearDown(): void
    {
        m::close();
    }

    /**
     * @dataProvider testData
     */
    public function test_capture_failures_for()
    {
        $browser = m::mock(stdClass::class);
        $browser->shouldReceive('screenshot')->with(
            'failure-Asciito_LaravelDawn_Tests_ProvidesBrowserTest_test_capture_failures_for-0'
        );
        $browsers = collect([$browser]);

        $this->captureFailuresFor($browsers);
    }

    /**
     * @dataProvider testData
     */
    public function test_store_console_logs_for()
    {
        $browser = m::mock(stdClass::class);
        $browser->shouldReceive('storeConsoleLog')->with(
            'Asciito_LaravelDawn_Tests_ProvidesBrowserTest_test_store_console_logs_for-0'
        );
        $browsers = collect([$browser]);

        $this->storeConsoleLogsFor($browsers);
    }

    public static function testData()
    {
        return [
            ['foo'],
        ];
    }

    /**
     * Implementation of abstract ProvidesBrowser::driver().
     */
    protected function driver()
    {
    }
}
