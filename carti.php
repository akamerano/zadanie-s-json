<?
$fileName = 'carti.json';
$fileData = file_get_contents($fileName);
$carti = json_decode($fileData, true)['carti'];
?>
<table border="1">
<thead>
	<tr>
		<th>Anul editie</th>
		<th>Titlu</th>
		<th>Nr de pagini</th>
		<th>Autori</th>		
	</tr>
</thead>
<tbody>
<?
foreach ($carti as $carte) {?>
<tr>
			<td><?=$carte['anul_editie'];?></td>
			<td><?=$carte['titlu'];?></td>
			<td><?=$carte['nr_pagini'];?></td>
			<td>
				<?
				foreach ($carte['autori'] as $ind => $autor) {
					?>
					<div><?=($ind + 1) . '. ' . $autor['nume'] . ' ' . $autor['prenume']?></div>
					<?
				}
				?>
			</td>		
</tr>	
<?}
?>