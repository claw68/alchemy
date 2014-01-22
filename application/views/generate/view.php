<div>
	<p style="font-weight: bold;">Generate</p>
	<br />
	<form action="<?php echo site_url(); ?>generate/doGenerate" method="post">
		<table>
			<tr>
				<td>Object Name:</td>
				<td><input type="text" name="object" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Generate!" />
				</td>
			</tr>
		</table>
	</form>
</div>