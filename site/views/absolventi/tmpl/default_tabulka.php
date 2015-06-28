<?php 
if($this->pocet >= 500) die("Spresnite zadanie (na menej ako 500)<br>Pocet zaznamov: ".$this->pocet);

?>
<table>
    <thead>
        <tr>
            <th>meno a priezvisko</th>
            <th>trieda</th>
            <th>rok</th>
            <th>triedny</th>
            <th>tablo</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($this->results as $result): ?>
	<?php $result->tablo_url = preg_replace('/phoca_thumb_[mls]_/','',$result->tablo_url); ?>
            <tr>
		<td><?php echo $result->meno.' '.$result->priezvisko; ?></td>
		<td><?php echo $result->trieda; ?></td>
		<td><?php echo $result->rok_nastupu.' - '.$result->rok_vystupu; ?></td>
		<td><?php echo $result->ucmeno.' '.$result->ucpriezvisko; ?></td>
		<?php if($result->tablo_url): ?>
			<td><a href=<?php echo '../../images/phocagallery/tabla/'.str_replace(' ', '%20', $result->tablo_url);?>>tablo</a></td>
		<?php else: ?>
			<td>N/A</td>
		<?php endif; ?>
	    </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>Pocet zaznamov: <?php echo $this->pocet; ?><br>                                                                          
