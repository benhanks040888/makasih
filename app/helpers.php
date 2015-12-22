<?php
if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' class="active"' : '';
	}
}
if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' class="active"' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' class="active"';
		}
		return '';
	}
}
if (!function_exists('classActiveOnlyPath')) {
	function classActiveOnlyPath($path)
	{
		return Request::is($path) ? ' active' : '';
	}
}
if (!function_exists('classActiveOnlySegment')) {
	function classActiveOnlySegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' active' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' active';
		}
		return '';
	}
}

if ( ! function_exists('assets_url'))
{
  /**
   * Get the URL to an asset
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function assets_url($asset)
  {
    return asset('assets/' . ltrim($asset, '/'));
  }
}

if ( ! function_exists('uploads'))
{
  /**
   * Get the URL to uploads folder
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function uploads($upload)
  {
    if (file_exists(public_path() . 'uploads/' . $upload)) {
      return 'no image broh';
    }
    return asset('uploads/' . ltrim($upload, '/'));
  }
}

if ( ! function_exists('uploads_path'))
{
  /**
   * Get the URL to uploads_path folder
   *
   * @param  string  $path
   * @param  bool    $secure
   * @return string
   */
  function uploads_path($upload)
  {
    if (file_exists(public_path() . 'uploads/' . $upload)) {
      return 'no image broh';
    }

    return public_path() . '/uploads/' . ltrim($upload, '/');
  }
}