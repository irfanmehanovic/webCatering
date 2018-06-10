<?php include 'header_osoblje.php'; ?> 
<?php include 'conection.php'; ?>

<?php
		//Ispis svih proizvoda iz baze, editovanje i brisanje proizvoda
		$sql = "SELECT id, naziv, opis, cijena_po_jedinici, tip, slika FROM proizvod";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th>ID</th><th>NAZIV</th><th>OPIS</th><th>CIJENA</th><th>TIP</th><th>SLIKA</th><th>delete</th><th>save</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<tr><form action='osobljeSave.php' method='POST'>";
		    	echo "<td><input style='width:25px' type='text' name='id' value='$row[id]'></td>";
		    	echo "<td><input type='text' name='naziv' value='$row[naziv]'></td>";
		    	echo "<td><input type='text' name='opis' value='$row[opis]'></td>";
		    	echo "<td><input type='text' name='cijena' value='$row[cijena_po_jedinici]'></td>";
		    	echo "<td><input type='text' name='tip' value='$row[tip]'></td>";
		    	echo "<td><input type='text' name='slika' value='$row[slika]'></td>";
		    	echo "<td><button><a href=\"deleteProizvod.php?id=".$row['id']."\">Delete</a></button></td>";
		    	echo "<td><button type='submit'>Save</button></td>";
		    	echo "</tr></form>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		

		//Dodavanje novih proizvoda u bazu podatak od strane osoblja
		echo "<br><br><form action='addProizvod.php' method='POST'>";
		echo "<fieldset style='width:400px'><legend>Dodaj novi proizvod:</legend>";
		echo "Naziv:<input type='text' name='naziv'><br>";
		echo "Opis:<input type='text' name='opis'><br>";
		echo "Cijena:<input type='text' name='cijena'><br>";
		echo "Tip:<input type='text' name='tip'><br>";
		echo "Slika:<input type='text' name='slika'><br>";
		echo "<button type='submit'>Add</button></fieldset></form>";


		//Ispis postova iz baze, editovanje i brisanje postova
		$sql = "SELECT id, naslov, opis FROM post";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th>ID</th><th>NASLOV</th><th>OPIS</th><th>delete</th><th>save</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<tr><form action='postSave.php' method='POST'>";
		    	echo "<td><input style='width:25px' type='text' name='id' value='$row[id]'></td>";
		    	echo "<td><input type='text' name='naslov' value='$row[naslov]'></td>";
		    	echo "<td><textarea name='opis' rows='4' cols='50'>$row[opis]</textarea></td>";
		    	echo "<td><button><a href=\"deletePost.php?id=".$row['id']."\">Delete</a></button></td>";
		    	echo "<td><button type='submit'>Save</button></td>";
		    	echo "</tr></form>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}

		//Dodavanje novih postova
		echo "<br><br><form action='addPost.php' method='POST'>";
		echo "<fieldset style='width:400px'><legend>Dodaj novi post:</legend>";
		echo "Naslov:<input type='text' name='naslov'><br>";
		echo "Opis:<textarea name='opis'></textarea><br>";
		echo "<button type='submit'>Add</button></fieldset></form>";
		

		//Ispis narudzbi na osoblje panelu, i omogućavanje promijenu statusa narudzbe na 1 tj. obradjena narudzba (0 znaci da je podnesen zahtijev za narudzbom, a 1 je da je zavrsena)
		//Brisanje narudzbi, sacuvanje promjene statusa (znaci nema edita ostalih polja osim STATUS-a)
		$sql = "SELECT id, naziv, tip, cijena_po_jedinici, vrijeme, status, user_id FROM narudzba";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th>ID</th><th>NAZIV</th><th>TIP</th><th>CIJENA</th><th>VRIJEME</th><th>STATUS</th><th>USER</th><th>PROMIJENI</th><th>delete</th><th>save</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "</tr>";
		    	echo "<td>$row[id]</td>";
		    	echo "<td>$row[naziv]</td>";
		    	echo "<td>$row[tip]</td>";
		    	echo "<td>$row[cijena_po_jedinici]</td>";
		    	echo "<td>$row[vrijeme]</td>";
		    	echo "<td>$row[status]</td>";
		    	echo "<td>$row[user_id]</td>";
		    	echo "<td><input type='checkbox' name='naslov' value='$row[status]'></td>";
		    	echo "<td><button><a href=\"deletePost.php?id=".$row['id']."\">Delete</a></button></td>";
		    	echo "<td><button><a href=\"statusSave.php?id=".$row['id']."\">Save</a></button></td>";
		    	echo "</tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}


		$conn->close(); 
		?>


<?php include 'footer_osoblje.php'; ?> 

