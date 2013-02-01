<?php

/**
 * Web front-end voor pywikipediabot
 *
 * (c) 2012, 2013 Kasper Souren
 *
 * Distributed under the terms of the MIT license.
 */


require_once 'settings.php';
require_once 'lib.php';

$wiki = $_REQUEST['wiki'];
$platform = $_REQUEST['platform'];

$content = '';
if (in_array($wiki, $wikis) && in_array($platform, $platforms)) {

  ob_start();
  print $start_msg;
  print get_key_from_value($wikis, $wiki) . ' platform: ' . get_key_from_value($platforms, $platform);
  $cmd = prepare_command($wiki, $platform);

  command($cmd, false);
  
  $content = ob_get_contents();
  $content .= '<hr />';
  ob_end_clean();
}

$content .= $content_help;
$content .= apply_template('form.tpl.php');

include 'template.php';
