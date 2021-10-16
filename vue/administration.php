	<h1>Administration</h1>
	<p>Confirmé l'ajout d'une recette</p>
    <table>
            <thead>
                <tr>
                    <th colspan="2">The table header</th>
                </tr>
            </thead>
		<?php foreach($rece as $name):?>
        <form enctype="multipart/form-data" metdod="post" action="index.php?uc=controleur&action=confirmeRece<?php $name['id'];?>">
            <tbody>
                <tr>
                    <td><?php echo $name['id'];?></td>
                    <td><?php echo $name['auteurId'];?></td>
                    <td><?php echo $name['nom'];?></td>
                    <td><?php echo $name['ingredients'];?></td>
                    <td><?php echo $name['description'];?></td>
                    <td><?php echo $name['image'];?></td>
                    <td><?php echo $name['etat'];?></td>
                    <td><?php echo $name['categorieId'];?></td>
                    <td><?php echo $name['datePublication'];?></td>
                    <div id = "Button">
		                <td><input type = "submit" value = "Valider recette" name = "valider"></td>
	                </div>
        </form>
        <form enctype="multipart/form-data" metdod="post" action="index.php?uc=controleur&action=SupprRece<?php $name['id'];?>">
            <div id = "Button">
		        <td><input type = "submit" value = "Refuser recette" name = "valider"></td>
	        </div></tr>
        </form>
		<?php endforeach;?>
            </tbody>
    </table>