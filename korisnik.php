<?php
// Start the session
session_start();
?>
<?php include 'header_korisnik.php'; ?> 
<?php include 'conection.php'; ?>

<?php

		//Kreiranje narudzbe od strane korisnika, unos u bazu, zapis koji korisnik je narucio preko sessije
		$sql = "SELECT naziv, opis, cijena_po_jedinici, tip, slika FROM proizvod";
		$result = $conn->query($sql);
		$uloga = $_SESSION["uloga"];

		if ($result->num_rows > 0) {
		    // output data of each row
		    echo "<table  border='1'><tr><th>Slika</th><th>Naziv</th><th>Opis</th><th>Cijena</th><th>Tip</th><th>Narudzba</th></tr>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<tr>";
		    	echo "<td><img src='proizvodi/$row[slika]'</td>";
		    	echo "<td><h1>$row[naziv]</h1></td>";
		    	echo "<td><p>$row[opis]</p></td>";
		    	echo "<td><p>$row[cijena_po_jedinici]</p></td>";
		    	echo "<td><p>$row[tip]</p></td>";
		    	echo "<td><a href='actionNarudzba.php?naziv=$row[naziv]&cijena=$row[cijena_po_jedinici]&tip=$row[tip]&uloga=$uloga'>Naruci</a></td>";
		    	echo "</tr></form>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}


		$conn->close(); 
		?>

<?php include 'footer_admin.php'; ?> 