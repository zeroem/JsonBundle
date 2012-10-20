<?php

namespace Zeroem\JsonBundle\Tests\Json;

use Zeroem\JsonBundle\Json\Decoder;

class DecoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider jsonData
     */
    public function testDencode($actual, $str) {
        $decoder = new Decoder;

        $this->assertEquals($actual, $decoder->decode($str));
    }

    public function jsonData() {
        return array(
            array('string', '"string"'),
            array(null, 'null'),
            array(true, 'true'),
            array(false, 'false'),
            array(array(1,2,3), '[1,2,3]'),
            );
    }
}
