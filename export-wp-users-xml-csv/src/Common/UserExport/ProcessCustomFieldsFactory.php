<?php

namespace Pmue\Common\UserExport;


use Pmue\Pro\UserExport\ProcessCustomFields as ProProcessCustomFields;

class ProcessCustomFieldsFactory
{
    /*
     * @return ProProcessCustomFields | ProcessCustomFields
     */
    public function create()
    {
        if(class_exists('\Pmue\Pro\UserExport\ProcessCustomFields')) {
            return new ProProcessCustomFields();
        } else {
            return new ProcessCustomFields();
        }
    }

}