<?php

namespace Zeroem\JsonBundle\Json;

class Decoder implements DecoderInterface
{
    private $flags=0;
    private $decodeToArray=false;
    private $depth=512;

    public function __construct($decodeToArray=false, $depth=512, $flags=0) {
        $this->flags = $flags;
        $this->decodeToArray = $decodeToArray;
        $this->setDepth($depth);
    }

    public function decode($data) {
        if(version_compare(PHP_VERSION, '5.4.0') >= 0) {
            $result = json_decode($data, $this->decodeToArray, $this->depth, $this->flags);
        } else {
            $result = json_decode($data, $this->decodeToArray, $this->depth);
        }

        if(null === $result) {
            $error = json_last_error();

            if(JSON_ERROR_NONE !== $error) {
                throw new \UnexpectedValueException(self::errorToString($error));
            }
        }

        return $result;
    }

    public function getFlags() {
        return $this->flags;
    }

    public function setFlags($flags) {
        $this->flags = $flags;
        return $this;
    }

    public function addFlags($flags) {
        $this->flags |= $flags;
        return $this;
    }

    public function removeFlags($flags) {
        $this->flags = (~ $flags) & $this->flags;
        return $this;
    }

    public function getDecodeToArray() {
        return $this->decodeToArray;
    }

    public function setDecodeToArray($value=true) {
        $this->decodeToArray = $value;
        return $this;
    }

    public function getDepth() {
        return $this->depth;
    }

    public function setDepth($depth) {
        assert($depth >= 0);

        $this->depth = $depth;
        return $this;
    }
}
