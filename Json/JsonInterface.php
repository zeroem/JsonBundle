<?php

namespace Zeroem\JsonBundle\Json;

interface JsonBundle\JsonInterface {
    /**
     * Encode the given data to a JSON string
     *
     * @param mixed $data data to encode
     *
     * @return string
     */
    public function encode($data);

    /**
     * Decode the given JSON string
     *
     * @param string $data
     *
     * @return mixed
     */
    public function decode($data);
}
