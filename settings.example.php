<?php

// Directory with pywikipediabot, you don't want this to available for the world
define ("PYWIKIPEDIADIR", '../pywikipedia');

// Your bot's password
define ("BOT_PASS", 'your pywikipediabot password(s)');


$title = "Pywikipediabot web frontend";

$wikis = array(
	       'Whateverwiki' => 'what',
               'Trashwiki' => 'trash',
	       );

$platforms = array(
		   'Test' => 'test',
		   'Acceptance' => 'acc',
		   'Production' => 'prod',
		   );

$content_help = '<div>Here you can launch a specific script.</div><hr />';

$start_msg = 'Started the script on ';

function prepare_command($wiki, $platform) {
  // Here you can put your command.
  // TODO: make generic, multiple commands.
  login($wiki . $platform);
  $cmd  = 'python replace.py -debug -pt:0 -ns:0   -start:! -fix:replace_links -nocase -always -log  -lang:' . $wiki . $platform . "; \n";
  $cmd .= 'python replace.py -debug -pt:0 -ns:150 -start:! -fix:replace_links -nocase -always -log  -lang:' . $wiki . $platform . ' &';
}