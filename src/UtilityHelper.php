<?php
namespace cloudgrayau\utils;

use CraftCms\Cms\Support\Arr;
use CraftCms\Cms\Ui\Nodes\MarkdownContent;

abstract class UtilityHelper {

  private static ?string $footerHtml = null;

  public static function footer(string $id = 'cloudgray-footer'): MarkdownContent {
    return MarkdownContent::make($id, self::footerHtml())->displayInPane(false);
  }

  /** Built once per request: settings pages render a footer on every tab. */
  public static function footerHtml(): string {
    if (self::$footerHtml !== null) {
      return self::$footerHtml;
    }
    $src = 'data:image/svg+xml;base64,' . base64_encode((string) file_get_contents(__DIR__ . '/resources/cloudgray.svg'));
    $logo = '<span role="img" aria-hidden="true" style="display:inline-block;vertical-align:middle;width:30px;height:30px;margin-right:3px;background-color:currentColor;-webkit-mask:url(' . $src . ') center/contain no-repeat;mask:url(' . $src . ') center/contain no-repeat;"></span>';
    return self::$footerHtml = '<hr><p style="text-align:right;margin-top:1em;"><a href="https://cloudgray.com.au/" target="_blank" style="text-decoration:none;color:inherit;">' . $logo . ' <small>Cloud Gray</small></a></p>';
  }

  public static function configWarning(string $handle, string $setting): ?string {
    $overrides = config("craft.$handle") ?? [];
    return Arr::has($overrides, $setting)
      ? "This is being overridden by the `$setting` setting in the `config/craft/$handle.php` file."
      : null;
  }

}
