<?php
class Beleptet_Model {
	public function get_data($vars): array {
		$retData['eredmeny'] = "";
		try {
			
			$connection = Database::getConnection();
			$sqlSelect = "select id, vezetek_nev, kereszt_nev, felhasznalo, jog from felhasznalok where felhasznalo=:felhasznalo and jelszo=:jelszo";
			$stmt = $connection->prepare($sqlSelect);
			$stmt->execute(array(
							   ':felhasznalo' => $vars['login'],
							   ':jelszo' => sha1($vars['password'])
						   ));
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			switch (count($felhasznalo)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					break;
				case 1:
					$retData['eredmény'] = "OK";
					$retData['uzenet'] = "Üdvözöljük " . $felhasznalo[0]['vezetek_nev'] . " " . $felhasznalo[0]['kereszt_nev'] . "!<br><br>
					                      Most már eléri a lekérdezési funkciókat!";
					$_SESSION['userid'] = $felhasznalo[0]['id'];
					$_SESSION['username'] = $felhasznalo[0]['felhasznalo'];
					$_SESSION['userlastname'] = $felhasznalo[0]['vezetek_nev'];
					$_SESSION['userfirstname'] = $felhasznalo[0]['kereszt_nev'];
					$_SESSION['userlevel'] = $felhasznalo[0]['jog'];
					Menu::setMenu();
					break;
				default:
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói név -jelszó párral!";
			}
		} catch (PDOException $e) {
			$retData['eredmény'] = "ERROR";
			$retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
		}
		return $retData;
	}
}
