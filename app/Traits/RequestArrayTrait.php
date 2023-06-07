<?php

namespace App\Traits;

trait RequestArrayTrait
{
    /**
     * Trim request array
     * @param array $param
     * @return array
     */
    protected function arrayParams($params)
    {
        foreach ($params as $key => $value) {
            $value = strtolower(trim($value));
            if ($value == null ?? '') {
                unset($params[$key]);
            }
        }
        return $params;
    }
}
