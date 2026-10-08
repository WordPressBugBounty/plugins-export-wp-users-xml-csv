<?php

namespace Pmue\Common\CombineFields;


use Pmue\Pro\CombineFields as ProCombineFields;


class CombineFieldsFactory
{
    public function create() {
        if(class_exists('\Pmue\Pro\CombineFields')) {
            return new ProCombineFields();
        } else {
            return new CombineFields();
        }
    }
}