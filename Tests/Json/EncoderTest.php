<?php

namespace Zeroem\JsonBundle\Tests\Json;

use Zeroem\JsonBundle\Json\Encoder;

class EncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider jsonData
     */
    public function testEncode($data, $json) {
        $encoder = new Encoder;

        $this->assertEquals($json, $encoder->encode($data));
    }

    public function jsonData() {
        $object = array(
            'key'=>'value'
        );

        return array(
            array('string', '"string"'),
            array(null, 'null'),
            array(true, 'true'),
            array(false, 'false'),
            array(array(1,2,3), '[1,2,3]'),
            array($object, '{"key":"value"}')
            );
    }
}
