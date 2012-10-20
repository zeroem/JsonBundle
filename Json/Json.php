<?php

namespace Zeroem\JsonBundle\Json;

class Json implements JsonInterface
{
    private $encoder;
    private $decoder;

    public function __construct(EncoderInterface $encoder, DecoderInterface $decoder) {
        $this->encoder = $encoder;
        $this->decoder = $decoder;
    }

    public function encode($data) {
        return $this->encoder->encode($data);
    }

    public function decode($data) {
        return $this->decoder->decode($data);
    }

    public static function errorToString($error) {
        switch ($error) {
        case JSON_ERROR_NONE:
            $message =  'No errors';
            break;
        case JSON_ERROR_DEPTH:
            $message =  'Maximum stack depth exceeded';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $message =  'Underflow or the modes mismatch';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $message =  'Unexpected control character found';
            break;
        case JSON_ERROR_SYNTAX:
            $message =  'Syntax error, malformed JSON';
            break;
        case JSON_ERROR_UTF8:
            $message =  'Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
        default:
            $message =  'Unknown error';
            break;
        }

        return $message;
    }

    public function getEncoder() {
        return $this->encoder;
    }

    public function setEncoder(EncoderInterface $encoder) {
        $this->encoder = $encoder;
        return $this;
    }

    public function getDecoder() {
        return $this->decoder;
    }

    public function setDecoder(DecoderInterface $decoder) {
        $this->decoder = $decoder;
        return $this;
    }
}

