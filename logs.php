<?php /* 

This code is living inside an iframe.
It's auto-refreshing every 5 seconds.

*/?><html>
<head>
<title>logs</title>
<script type="text/javascript">
function timedRefresh(timeoutPeriod) {
   setTimeout("location.reload(true);", timeoutPeriod);
}
</script>
</head>

<body onload="JavaScript:timedRefresh(5000);">
<div style="font-size:10px">
<?php

require_once 'settings.php';
require_once 'lib.php';

print '<pre>' . now() . '</pre>';

show_log('commands', 8);
show_log('replace', 30);

?>
</div>
</body>
</html>