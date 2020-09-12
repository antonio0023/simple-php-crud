<?php 

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if( isset($_POST['delete'])){
	$sql = "DELETE FROM company WHERE idcomp=" . $_POST['idcomp'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Empresa eliminada correctamente</div>";
	}
}

$sql 	= "SELECT * FROM company";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>Empresas</h2>
	<table class="table table-bordered table-striped">
		<tr>
			<td><h4>Nombre</h4></td>
			<td><h4>Telefono</h4></td>
			<td><h4>Direccion</h4></td>
			<td><h4>Sitio web</h4></td>
			<td><h4>Propietario</h4></td>
			<!-- <td width="70px">Eliminar</td>
			<td width="70px">Editar</td> -->
		</tr>
		<?php
		while( $row = $result->fetch_assoc()){ 
			echo "<form action='' method='POST'>";	//added
			echo "<input type='hidden' value='". $row['idcomp']."' name='idcomp' />"; //added
			echo "<tr>";
			echo "<td>".$row['namecomp'] . "</td>";
			echo "<td>".$row['contactnum'] . "</td>";
			echo "<td>".$row['addresscomp'] . "</td>";
			echo "<td>".$row['website'] . "</td>";
			echo "<td>" ."<p><b> Nombre:</b> ".$row['firstname'] ."</p>"
						."<p><b> Apellido:</b> ".$row['lastname'] ."</p>"
						."<p><b> Teléfono:</b> ".$row['cellnum'] ."</p>"
						."<p><b> E-mail 1:</b> ".$row['firstemail'] ."</p>"
						."<p><b> E-mail 2:</b> ".$row['secondemail'] ."</p>".
					"</td>";
			echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
			echo "<td><a href='edit.php?idcomp=".$row['idcomp']."' class='btn btn-info '>Edit</a></td>";
			echo "</tr>";
			echo "</form>"; //added 
		}
		?>
	</table>
<?php 
}
else
{
	echo "<br><br>No se encontraron registros ";
}
?> 
</div>

<?php 

 require_once 'footer.php';