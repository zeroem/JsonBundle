<?php

namespace Zeroem\JsonBundle\Json;

interface DecoderInterface {
    /**
     * Decode the given JSON string
     *
     * @param string $data
     *
     * @return mixed
     */
    public function decode($data);
}
