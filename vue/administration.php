	<h1>Administration</h1>
    <table>
        <thead>
            <tr>
                <th colspan="2">Confirmé l'ajout d'une recette</th>
            </tr>
        </thead>
        <tbody>
            <tr>
		        <?php foreach($rece as $name):?>
                    <form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=confirmeRece">
                    <input name = "id" value = "<?php echo $name['id'];?>"hidden>
                    <td><?php echo $name['id'];?></td>
                    <td><?php echo $name['auteurId'];?></td>
                    <td><?php echo $name['nom'];?></td>
                    <td><?php echo $name['ingredients'];?></td>
                    <td><?php echo $name['description'];?></td>
                    <?php if ($name['image']){ ?>
                        <td><img id="img" src="<?php echo $name['image'];?>"/></td>
                    <?php } ?>
                    <td><?php echo $name['etat'];?></td>
                    <td><?php echo $name['categorieId'];?></td>
                    <td><?php echo $name['datePublication'];?></td>
                    <div id = "Button">
                        <td><input type = "submit" value = "Validé la recette" name = "valider"></td>
	                </div>
                    </form>
                    <form enctype="multipart/form-data" method="post" action="index.php?uc=controleur&action=SupprRece">
                    <div id = "Button">
		                <td><input type = "submit" value = "Refuser la recette" name = "valider"></td>
	                </div>
            </tr>
                    </form>
                <?php endforeach;?>
        </tbody>
    </table>