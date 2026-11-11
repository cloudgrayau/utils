<?php
namespace cloudgrayau\utils;

use Craft;
use CraftCms\Cms\Ui\Nodes\MarkdownContent;
use CraftCms\Cms\Helpers\Html;
use CraftCms\Cms\Support\Arr;

abstract class UtilityHelper {

  // Native
  // =========================================================================

  public static function footer(string $id = 'cloudgray-footer'): MarkdownContent {
    return MarkdownContent::make($id, self::footerHtml())->displayInPane(false);
  }
  
  public static function footerHtml(): string {
    $svg = file_get_contents(__DIR__.'/resources/cloudgray.svg');
    $src = 'data:image/svg+xml;base64,' . base64_encode($svg);
    $logo = '<span role="img" aria-hidden="true" style="display:inline-block;vertical-align:middle;width:30px;height:30px;margin-right:3px;background-color:currentColor;-webkit-mask:url(' . $src . ') center/contain no-repeat;mask:url(' . $src . ') center/contain no-repeat;"></span>';
    return '<hr><p style="text-align:right;margin-top:1em;"><a href="https://cloudgray.com.au/" target="_blank" style="text-decoration:none;color:inherit;">'.$logo.' <small>Cloud Gray</small></a></p>';
  }

  public static function configWarning(string $handle, string $setting): ?string {
    $overrides = config("craft.$handle") ?? [];
    return Arr::has($overrides, $setting)
      ? "This is being overridden by the `$setting` setting in the `config/craft/$handle.php` file."
      : null;
  }

}