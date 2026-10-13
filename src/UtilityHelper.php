<?php
namespace cloudgrayau\utils;

use Craft;
use CraftCms\Cms\Form\Nodes\MarkdownContent;
use CraftCms\Cms\Helpers\Html;
use CraftCms\Cms\Support\Arr;

abstract class UtilityHelper {

  // Native
  // =========================================================================

  public static function footer(): MarkdownContent {
    return MarkdownContent::make('cloudgray-footer', self::footerHtml())->displayInPane(false);
  }
  
  public static function footerHtml(): string {
    $svg = file_get_contents(__DIR__.'/resources/cloudgray.svg');
    $src = 'data:image/svg+xml;base64,'.base64_encode($svg);
    return '<hr style="border-color:#e9eced;"><p style="text-align:right;margin-top:1em;"><a href="https://cloudgray.com.au/" target="_blank" style="text-decoration:none;color:#000;"><img src="'.$src.'" width="30" height="30" alt="" style="display:inline-block;vertical-align:middle;margin-right:3px;"> <small>Cloud Gray</small></a></p>';
  }

  public static function configWarning(string $handle, string $setting): ?string {
    $overrides = config("craft.$handle") ?? [];
    return Arr::has($overrides, $setting)
      ? "This is being overridden by the `$setting` setting in the `config/craft/$handle.php` file."
      : null;
  }

}