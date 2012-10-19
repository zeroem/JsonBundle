<?php

namespace Zeroem\Json;

interface EncoderInterface {
    /**
     * Encode the given data to a JSON string
     *
     * @param mixed $data data to encode
     *
     * @return string
     */
    public function encode($data);
}
