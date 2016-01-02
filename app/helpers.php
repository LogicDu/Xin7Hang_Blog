<?php

/**
 * 返回可读性更好的文件尺寸
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
}

/**
 * 判断文件的MIME类型是否为图片
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}

/**
 * 通过图片的url返回制定规格的缩略图url
 */
function getThumbnil($path,$spec)
{
    $filenameInfo = pathinfo($path);
    $baseName = str_replace('.'.$filenameInfo['extension'],'',$filenameInfo['basename']);
    $result = $filenameInfo['dirname'].'/'.$baseName.'_'.$spec['width'].'x'.$spec['height'].'.'.$filenameInfo['extension'];
    return $result;
}
