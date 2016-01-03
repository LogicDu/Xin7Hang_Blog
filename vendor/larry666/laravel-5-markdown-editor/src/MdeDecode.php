<?php

namespace Plugins\MarkDownEditor;


class MdeDecode
{
    public static function decode($content)
    {
        $mde=new MdeEditor();
        return $mde->decode($content);
    }
}