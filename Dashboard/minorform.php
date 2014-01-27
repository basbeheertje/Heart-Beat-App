<html>
	<body>
		<form action="minor.php" name="formuliertje" method="POST">
			<table>
				<tr>
					<td>
						Gebruiker:
					</td>
					<td>
						<select name="user">
							<option value="16">
								Test
							</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Hartslag:
					</td>
					<td>
						<input type="number" name="hartslag" value="<?php echo rand(60,135); ?>"/>
					</td>
				</tr>
				<tr>
					<td>
						&nbsp;
					</td>
					<td>
						<input type="submit" value="Verstuur">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>