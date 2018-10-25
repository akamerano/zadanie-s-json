<?
	$fileName = "carti.json";
	if(!empty($_POST['anul_editie']) && !empty($_POST['titlu']) && !empty($_POST['nr_pagini']) && !empty($_POST['autori'])){
		$fileData = file_get_contents($fileName);
		$carti = json_decode($fileData, true)['carti'];
		$autori = split(';', $_POST['autori']);
		$newAutori = [];
		foreach ($autori as $autor) {
			$autor = split(' ', $autor);
			$newAutori[] = [
				'prenume' => $autor[0],
				'nume' => $autor[1]
			];
		}
		$newElement = [
			"id" => end($carti)['id'] + 1,
			"anul_editie" => trim($_POST['anul_editie']),
			"titlu" => trim($_POST['titlu']),
			"nr_pagini" => trim($_POST['nr_pagini']),
			"autori" => $newAutori
		];
		$carti[] = $newElement;
		file_put_contents($fileName, json_encode(['carti' => $carti]));
	}
?>

<form method="post">
	<div>
		<label>Anul editie</label>
		<input type="text" name="anul_editie">
	</div>
	<div>
		<label>Titlu</label>
		<input type="text" name="titlu">
	</div>
	<div>
		<label>Numarul de paginii</label>
		<input type="text" name="nr_pagini">
	</div>
	<div>
		<label>Autori</label>
		<input type="text" name="autori">
	</div>
	<div>
		<input type="submit" value="Adauga">
	</div>
</form>