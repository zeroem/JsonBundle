<?php

namespace Zeroem\Json;

class Encoder implements EncoderInterface
{
    private $flags;

    public function encode($data) {

        if(version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $result = json_encode($data, $this->flags);
        } else {
            $result = json_encode($data);
        }

        if(false === $result) {
            throw new \RuntimeException(Json::errorToString(json_last_error()));
        }

        return $result;
    }

    public function prettyPrint() {
        if(version_compare(PHP_VERSION, '5.4.0') >= 0) {
            $this->setFlags(JSON_PRETTY_PRINT);
        }

        return $this;
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
        $this->flags = (^ $flags) & $this->flags;
        return $this;
    }
}
