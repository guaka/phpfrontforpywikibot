<form id="frm" action="index.php" method="POST" onSubmit="b = document.getElementById('sButton'); b.value = 'Executing...'; b.disabled = true">
<table>
   <tr><th>wiki</th><td>   <?php option_list('wiki', $wikis); ?></td></tr>
   <tr><th>platform</th><td>   <?php option_list('platform', $platforms); ?></td></tr>
<tr><th> </th><td>   <input type="submit" name="sButton"  id="sButton" value="Execute"  /></td></tr>

</table>
</form>
