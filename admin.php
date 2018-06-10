<?php include 'header_admin.php'; ?> 
<?php include 'conection.php'; ?>

<?php  
/**
<div class="table-responsive-sm">
  <table class="table">

<?php
$sql = "SELECT * FROM proizvod";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        echo "<tr>
<td>".$row["id"]."</td>
<td>".$row["naziv"]."</td>
<td>".$row["opis"]."</td>
<td>".$row["cijena_po_jedinici"]."</td>
<td>".$row["tip_proizvoda_id"]."</td>
<td><img width='100px' src='slike/".$row["foto"]."'></td>
        </tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>


   
  </table>
</div>
**/
?>




	<!--<div class="container page">
		
   <h3>Proizvodi</h3>
		<hr>

	<form>
		<div class="row">
				<div class="col-12">
							<label>Naziv</label>
							<input type="text" name="Naziv" class="form-control">	
						</div>
		


		<div class="col-12">
			<label>Opis</label>
			<input type="text" name="opis" class="form-control">	
						</div>

		<div class="col-6">
			<label>Cijena</label>
			<input type="text" name="cijena" class="form-control">	
						</div>

		<div class="col-6">

				<label>Tip</label>
				<select class="form-control" name="tip">
			    <option value="kineska">Kineska</option>
			    <option value="meksicka">Meksička</option>
			    <option value="talijanska">Italijanska</option>
			    <option value="bosanska">Bosanska</option>
			  </select>
			</div>

		<div class="col-12"> <hr> </div>
		<div class="col-12">

			<button type="submit" class="btn btn-danger">Snimi</button>
		</div>

		</div>
	</form>	
	<br>
</div> -->
<?php 
		//Ispis korisnika iz baze, editovanje i brisanje korisnika
		$sql = "SELECT id, username, password, ime, prezime FROM user";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th>ID</th><th>USERNAME</th><th>PASSWORD</th><th>IME</th><th>PREZIME</th><th>delete</th><th>save</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<tr><form action='adminSave.php' method='POST'>";
		    	echo "<td><input style='width:25px' type='text' name='id' value='$row[id]'></td>";
		    	echo "<td><input type='text' name='korisnikUsername' value='$row[username]'></td>";
		    	echo "<td><input type='text' name='korisnikPassword' value='$row[password]'></td>";
		    	echo "<td><input type='text' name='korisnikIme' value='$row[ime]'></td>";
		    	echo "<td><input type='text' name='korisnikPrezime' value='$row[prezime]'></td>";
		    	echo "<td><button><a href=\"delete.php?id=".$row['id']."\">Delete</a></button></td>";
		    	echo "<td><button type='submit'>Save</button></td>";
		    	echo "</tr></form>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}

		//Dodavanje novog korisnika od strane admina
		echo "<br><br><form action='actionReg.php' method='POST'>";
		echo "<fieldset style='width:400px'><legend>Dodaj novog korisnika:</legend>";
		echo "Ime:<input type='text' name='korisnikIme' required><br>";
		echo "Prezime:<input type='text' name='korisnikPrezime' required><br>";
		echo "Username:<input type='text' name='korisnikUsername' required><br>";
		echo "Password:<input type='text' name='korisnikPassword' required><br>";
		echo "E-mail:<input type='text' name='korisnikEmail' required><br>";
		echo "Drzava:<input type='text' name='korisnikDrzava' required><br>";
		echo "Grad:<input type='text' name='korisnikGrad' required><br>";
		echo "Adresa:<input type='text' name='korisnikAdresa' required><br>";
		echo "Telefon:<input type='text' name='korisnikTelefon' required><br>";
		echo "Broj kartice:<input type='number' name='brojKartice' required min='16'><br>";
		echo "Tip kartice:<select name='tipKartice' class='form-control' required>
				<option>Visa</option>
  				<option>MasterCard</option>
  				<option>Maestro</option>
  				<option>AmericanExpress</option>
				</select><br>";
		echo "Ime na kartici:<input type='text' name='imeKartice' required><br>";
		echo "Mjesec isteka:<select name='datumKartice' required>
  				<option>Januar</option>
  				<option>Februar</option>
  				<option>Mart</option>
  				<option>April</option>
  				<option>Maj</option>
  				<option>Juni</option>
  				<option>Juli</option>
  				<option>August</option>
				<option>Septembar</option>
  				<option>Oktobar</option>
  				<option>Novembar</option>
  				<option>Decembar</option>
			</select><br>";
		echo "Godina isteka:<select name='godinaKartice' required>
  				<option>2018</option>
  				<option>2019</option>
  				<option>2020</option>
  				<option>2021</option>
  				<option>2022</option>
  				<option>2023</option>
  				<option>2024</option>
  				<option>2025</option>
			</select><br>";
		echo "<button type='submit'>Add</button></fieldset></form>";


		//Mijenjanje title, i ostala podesavanja na stranici(Tabela: podesavanja)
		$sql = "SELECT id,title FROM podesavanja";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th></th><th>TITLE</th><th>save</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<tr><form action='podesavanjaSave.php' method='POST'>";
		    	echo "<td><input style='width:25px' type='hidden' name='id' value='$row[id]'></td>";
		    	echo "<td><input type='text' name='title' value='$row[title]'></td>";
		    	echo "<td><button type='submit'>Save</button></td>";
		    	echo "</tr></form>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}

		$conn->close(); 
		?>



<?php include 'footer_admin.php'; ?> 

