<div class="container">
	<div>
		<h1 class="text-center display-3"><?=  $equipo->nombre_equipo ?></h1>
	</div>

	<h1>Informacion</h1>
	  <p></p>
	  <blockquote class="blockquote">
	    <p>
		    El equipo <strong><?=  $equipo->nombre_equipo ?></strong> se inscribio 
		    en la Asociacion de Pre-Veteranos "San Nicolas" el <?= date("d/m/Y", strtotime($equipo->fecha_ingreso)) ?>,
		    para jugar el Torneo <?php $i = 0; foreach($torneo as $tor){ if($i == 0 ) { echo $tor->nombre_torneo." ".$tor->anio;} $i++; } ?>
		    y desde ahi hasta la actualidad disputo <?= $i ?> torneos.
	    </p>
	    <p>
	    	Ademas participo en los siguientes Torneos:
	    </p>
	    <p>
	    	<table class="table table-borderless">
			    <thead>
			      <tr>
			      	<th class="text-center">#</th>
			        <th class="text-center">Torneos</th>
			        <th class="text-center">Puesto</th>
			        <th class="text-center">Puntos</th>
			        <th class="text-center">PJ</th>
			        <th class="text-center">PG</th>
			        <th class="text-center">PE</th>
			        <th class="text-center">PP</th>
			        <th class="text-center">GF</th>
			        <th class="text-center">GC</th>
			        <th class="text-center">Dif</th>
			      </tr>
			    </thead>
			    <tbody>
			    	
			    		
			    <?php 
			    $i = 1;
			    foreach($torneo as $tor){?>
	    			<tr> 
	    			 	<td class="text-center"><?= $i ?></td>
	    			 	<td class="text-center"><?= $tor->nombre_torneo." ".$tor->anio ?></td> 
	    			 	<?php 
	    			 			    			 		
	    			 		$datos = $this->equipo->posicion($tor->id_equipo, $tor->id_torneo);

	    			 		if ($datos) {?>
	    			 			<td class="text-center"><?= $datos->posicion ?>°</td>
	    			 			<td class="text-center"><?= $datos->puntos ?></td>
	    			 			<td class="text-center"><?= $datos->partidos_jugados ?></td>
	    			 			<td class="text-center"><?= $datos->pg ?></td>
	    			 			<td class="text-center"><?= $datos->pe ?></td>
	    			 			<td class="text-center"><?= $datos->pp ?></td>
	    			 			<td class="text-center"><?= $datos->goles_favor ?></td>
	    			 			<td class="text-center"><?= $datos->goles_contra ?></td>
	    			 			<td class="text-center"><?= $dif = $datos->goles_favor - $datos->goles_contra ?></td>
	    			 			
	    			 	<?php	
	    			 		}else{?>
	    			 			<td class="text-center">Jugando.. </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 			<td class="text-center"> - </td>
	    			 	<?php		
	    			 		}

	    			 	?>
	    			 	
	    			</tr>
	    		<?php
	    		$i++;
	    		} ?>        
			        
			      
			      
			    </tbody>
			 </table>

	    </p>

	    <footer class="blockquote-footer">From WWF's website</footer>
	  </blockquote>

</div>