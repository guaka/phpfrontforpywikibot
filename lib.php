<?php

/**
 * Web front-end voor pywikipediabot
 *
 * (c) 2012, 2013 Kasper Souren
 *
 * Distributed under the terms of the MIT license.
 */


/* Execute a pywikipediabot command */
function command($cmd, $debug = false) {
  if ($debug) {
    echo '<pre>';
    echo $cmd . "\n";
    echo '</pre>';
  }
  $cmd = 'cd ' . PYWIKIPEDIADIR . ';' . $cmd;
  $output = shell_exec($cmd);
  if ($debug) {
    var_dump($debug);
    echo '</pre>';
  }
}

/* Log pywikipediabot into a wiki */
function login($wiki) {
  command('python login.py -lang:' . $wiki . ' -pass:' . BOT_PASS);
}

function now() {
  return date('Y-m-d H:i:s');
}

/* Show last 10 lines of pywikipediabot logs */
function show_log($what, $length = 10) {
  echo '<h2>'. $what . '</h2>';
  echo '<pre>';
  system('tail -' . $length  . ' ' . PYWIKIPEDIADIR . '/logs/' . $what . '.log | '.
	 'tac | ' .   // Reverse cat
	 'sed s/' . BOT_PASS . '/PASSWORD/');
  echo '</pre>';
}


/* Array helper */
function get_key_from_value($arr, $value) {
  $r_arr = array_flip($arr);
  return $r_arr[$value];
}

/* Apply a PHP template file and return resulting strings */
function apply_template($tpl_file, $vars = array(), $include_globals = true) {
  extract($vars);
 
  if ($include_globals) {
    extract($GLOBALS, EXTR_SKIP);
  }
 
  ob_start();
  require($tpl_file);
  $applied_template = ob_get_contents();
  ob_end_clean();

  return $applied_template;
}
 
/* Helper for <select> */
function option_list($name, $options) {
  echo '<select name="'. $name . '">';
  foreach ($options as $option => $value) {
    print '<option value="' . $value . '">' . $option . '</option>';
  }
  echo '</select>';
}


