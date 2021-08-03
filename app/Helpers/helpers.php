<?php

if (! function_exists('asset_cdn')) {
    function asset_cdn($path)
    {
        if (is_null($path) || empty($path)) {
            return '';
        }
        return asset('cdn'. '/' . $path);
    }
}

if (! function_exists('array_key_set')) {
	function array_key_set($array, $keySearch)
	{
	    foreach ($array as $key => $item) {
	        if ($key == $keySearch) {
	            return true;
	        } else if (is_array($item)) {
	            return findKey($item, $keySearch);
	        }
	    }
	    return false;
	}
}