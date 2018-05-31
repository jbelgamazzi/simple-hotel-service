<?php

namespace SimpleService\VO;

class Url
{
    use ScalarVo;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("INVALIDATE_URL");
        }
        $this->valorizeScalar($value);
    }
}
