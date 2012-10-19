<?php

namespace Zeroem\Json;

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
