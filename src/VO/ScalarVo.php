<?php

namespace SimpleService\VO;

trait ScalarVo
{
    /**
     * @var mixed $value
     */
    protected $value;

    /**
     * @var mixed $value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $scalarValue
     * @throws \InvalidArgumentException
     */
    protected function valorizeScalar($scalarValue)
    {
        if (!is_scalar($scalarValue)) {
            throw new \InvalidArgumentException('INVALID_SCALAR');
        }
        $this->value = $scalarValue;
    }
}
