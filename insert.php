<?php 

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
	<?php 

	if(isset($_POST['addnew'])){

		if( empty($_POST['namecomp']) ||
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

			$sql1 = "INSERT INTO company (namecomp,addresscomp,contactnum,website,firstname,lastname,
			cellnum,firstemail,secondemail) 
		    VALUES('$namecomp','$addresscomp','$contactnum','$website','$firstname',
			'$lastname','$cellnum','$firstemail','$secondemail')";
			if( ($con->query($sql1) === TRUE)){
				echo "<div class='alert alert-success'>Empresa agregada correctamente</div>";
			}else{
				echo "<div class='alert alert-danger'>Se ha producido un error agregando el registro</div>";
			}
		}
	}
	?>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp; Agregar empresa</h3> 
			<p class="text-danger".small>Campos requeridos *</p>
			<form action="" method="POST">
				<label for="namecomp">Nombre *</label>
				<input type="text" id="namecomp"  name="namecomp" maxlength="50" class="form-control"><br>

				<label for="addresscomp">Dirección</label>
				<textarea rows="4" name="addresscomp" maxlength="150" class="form-control"></textarea><br>

				<label for="contactnum">Número de teléfono *</label> 
				<input type="text"  name="contactnum" id="contactnum" pattern="[0-9]+" title="Ingrese solo números" class="form-control"><br>

				<label for="website">Sitio Web</label>
				<input type="text" name="website" id="website" maxlength="30" class="form-control">
				<h3>Datos del propietario</h3> 
			
				<label for="firstname">Nombre *</label>
				<input type="text" id="firstname"  name="firstname" maxlength="30" class="form-control"><br>

				<label for="lastname">Apellido *</label>
				<input type="text"  name="lastname" id="lastname" maxlength="30" class="form-control"><br>

				<label for="cellnum">Número de teléfono *</label> 
				<input type="text"  name="cellnum" id="cellnum" maxlength="20" pattern="[0-9]+" title="Ingrese solo números" class="form-control"><br>

				<label for="firstemail">E-mail 1 *</label>
				<input type="text" name="firstemail" id="firstemail" maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" class="form-control"><br>

				<label for="secondemail">E-mail 2</label>
				<input type="text" name="secondemail" id="secondemail" maxlength="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo válido" class="form-control">
				<br>
				<input type="submit" name="addnew" class="btn btn-success" value="Registrar">
			</form>
		</div>

	</div>
</div>
</div>

<?php 

 require_once 'footer.php';