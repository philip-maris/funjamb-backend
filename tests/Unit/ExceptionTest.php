<?php
use \Tests\TestCase;
use \App\Util\ExceptionUtil\ExceptionUtil;

class ExceptionTest extends TestCase
{
    /**
     * @throws ExceptionUtil
     */
    public function test_exception(){
        throw new ExceptionUtil(\App\Util\ExceptionUtil\ExceptionCase::SYSTEM_MALFUNCTION);
    }
}
