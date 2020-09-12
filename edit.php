<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 
	
	if(isset($_POST['update'])){

		if(empty($_POST['namecomp']) ||
		empty($_POST['contactnum']) ||
		empty($_POST['firstname']) ||
		empty($_POST['lastname']) ||
		empty($_POST['cellnum']) ||
		empty($_POST['firstemail'])){
		echo "Llena los campos requeridos!";  
		}else{		
			$namecomp  = $_POST['namecomp'];
			$addresscomp = $_POST['addresscomp'];
			$contactnum = $_POST['contactnum'];
			$website  = $_POST['website'];

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$cellnum = $_POST['cellnum'];
			$firstemail = $_POST['firstemail'];
			$secondemail = $_POST['secondemail'];
			$sql = "UPDATE company SET namecomp='{$namecomp}',
									   addresscomp = '{$addresscomp}',
									   contactnum = '{$contactnum}',
									   website = '{$website}',
									   firstname = '{$firstname}',
									   lastname = '{$lastname}',
									   cellnum = '{$cellnum}',
									   firstemail = '{$firstemail}',
									   secondemail = '{$secondemail}'
					WHERE idcomp=".$_POST['idcomp'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Registro actualizado con exito</div>";
			}else{
				echo "<div class='alert alert-danger'>Se produjo un error al actualizar el registro</div>";
				printf($con->error);
			}
		}
	}
	$idcomp = isset($_GET['idcomp']) ? (int) $_GET['idcomp'] : 0;
	$sql = "SELECT * FROM company WHERE idcomp={$idcomp}";
	$result = $con->query($sql);

	if($result->num_rows < 1){

		header('Location: index.php');
		exit;
	}
	$row = $result->fetch_assoc();
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar registro</h3> 
			<p class="text-danger" .small>Campos requeridos *</p>
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['idcomp']; ?>" name="idcomp">
				
				<label for="namecomp">Nombre*</label>
				<input type="text" id="namecomp"  name="namecomp" maxlength="50" value="<?php echo $row['namecomp']; ?>" class="form-control"><br>
				
				<label for="addresscomp">Dirección</label>
				<textarea rows="4" name="addresscomp" maxlength="150" class="form-control"><?php echo $row['addresscomp']; ?></textarea><br>

				<label for="contactnum">Número de teléfono *</label> 
				<input type="text"  name="contactnum" id="contactnum" pattern="[0-9]+" title="Ingrese solo números" value="<?php echo $row['contactnum']; ?>" pattern="[0-9]+" title="Ingrese sólo números" class="form-control"><br>

				<label for="website">Sitio Web</label>
				<input type="text" name="website" id="website" maxlength="30" value="<?php echo $row['website']; ?>" class="form-control">
				<h3>Datos del propietario</h3> 
			
				<label for="firstname">Nombre *</label>
				<input type="text" id="firstname"  name="firstname" maxlength="30" value="<?php echo $row['firstname']; ?>"  class="form-control"><br>

				<label for="lastname">Apellido *</label>
				<input type="text"  name="lastname" id="lastname" maxlength="30" value="<?php echo $row['lastname']; ?>" class="form-control"><br>

				<label for="cellnum">Número de teléfono *</label> 
				<input type="text"  name="cellnum" id="cellnum" maxlength="20" pattern="[0-9]+" title="Ingrese solo números" value="<?php echo $row['cellnum']; ?>" pattern="[0-9]+" title="Ingrese solo números" class="form-control"><br>

				<label for="firstemail">E-mail 1 *</label>
				<input type="text" name="firstemail" id="firstemail" maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" value="<?php echo $row['firstemail']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" class="form-control"  class="form-control"><br>

				<label for="secondemail">E-mail 2</label>
				<input type="text" name="secondemail" id="secondemail" maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" value="<?php echo $row['secondemail']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" class="form-control">
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Actualizar">
				
			</form>
		</div>
	</div>
</div>
</div>

<?php 

 require_once 'footer.php';