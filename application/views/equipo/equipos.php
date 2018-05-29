<div class="container">
<br>
  <div class="row">
    <div class="col-md-3">
      <input id="buscar" type="text" class="form-control" placeholder="Buscar.."><br>
    </div>
    <div class="col-md-7"></div>
    <div class="col-md-2">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#equipoModal">
        Nuevo Equipo
      </button>
    </div>
  </div>

  <div id="mensaje"></div>

  <div class="table-responsive-sm .table-responsive-xm">  
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th class="text-center" scope="col">Nombre</th>
          <th class="text-center" scope="col">Fecha de Ingreso</th>
          <th class="text-center" scope="col">Categoria</th>
          <th class="text-center" scope="col">Estado</th>
          <th class="text-center" scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody id="Table">

      <?php 

              if ($equipos) {
                  
                $i = 1;
                foreach ($equipos->result() as $equipo) {?>
                
                <tr id="<?= $i ?>" data="<?= $i ?>"> 

                  <!-- <th class="text-center" scope="row"><?= $i ?></th> --> 
                  <td class="text-center"><?php echo $equipo->nombre_equipo ?></td> 
                  <?php
                    $fecha = date("d-m-Y", strtotime($equipo->fecha_ingreso));
                    
                  ?>
                  <td class="text-center"><?php echo $fecha ?></td>
                  <td class="text-center"><?= $equipo->categoria ?></td>
                  <td class="text-center">
                  <?php   if ($equipo->estado == 0) {?>
                        <strong><font color="red">DesHabilitado</font></strong> 
                        <?php
                      }
                      else{?>
                        <strong><font color="blue">Habilitado</font></strong>
                      <?php
                        }  ?>
                  </td>
                  <td class="text-center">
                                      <a href="<?= base_url() ?>equipos/mostrar/<?= $equipo->id ?>" class="btn btn-sm btn-info"><span class="oi oi-aperture"></span></a>
                                      <a data-toggle="modal" data-target="#editar_equipo" onclick="selEquipo('<?= $equipo->id ?>', '<?= $equipo->nombre_equipo ?>', '<?= $equipo->fecha_ingreso ?>', '0')" class="btn btn-sm btn-primary"><span class="oi oi-pencil"></span></a>
                                      <a href="#" id="delete" onclick="elimarSiNo('<?= $equipo->id ?>', '<?= $i ?>')" class="btn btn-sm btn-danger btn-delete"><span class="oi oi-trash"></span></a>
                              </td>
            
                  
                </tr>
              
              <?php
                  $i++; 
                }
              }else{  

                if ($equipo) {?>
                  <tr> 

                  <td class="text-center"><?php echo $equipo->nombre_equipo ?></td> 
                  <?php
                    $fecha = date("d-m-Y", strtotime($equipo->fecha_ingreso))
                    
                  ?>
                  <td class="text-center"><?php echo $fecha ?></td>
                  <td class="text-center"><?= $equipo->categoria ?></td>
                  <td class="text-center">
                  <?php   if ($equipo->estado == 0) {?>
                        <a href="<?= base_url() ?>equipos/activar/<?= $equipo->id ?>/1" class="btn btn-sm btn-danger">Activar</a>
                      <?php
                      }
                      else{?>
                        <a href="<?= base_url() ?>equipos/activar/<?= $equipo->id ?>/1" class="btn btn-sm btn-primary">DesActivar</a>
                        <?php
                      }  ?>
                  </td>
                  <td class="text-center">
                                      <a href="<?= base_url() ?>equipos/view_equipo/<?= $equipo->id ?>" class="btn btn-sm btn-info"><span class="oi oi-aperture"></span></a>
                                      <a data-toggle="modal" data-target="#editar_equipo" onclick="selEquipo('<?= $equipo->id ?>', '<?= $equipo->nombre_equipo ?>', '<?= $equipo->fecha_ingreso ?>', '1')" class="btn btn-sm btn-primary"><span class="oi oi-pencil"></span></a>
                                      <a href="#" id="delete" onclick="elimarSiNo()" class="btn btn-sm btn-danger btn-delete"><span class="oi oi-trash"></span></a>
                              </td>
            
                  
                </tr>
                  

                  
              <?php     
                }             
              
              } ?>
        
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="equipoModal">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Equipo Nuevo</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              
              <form action="<?= base_url() ?>equipos/nuevo" method="POST">
                  <div class="form-group">
                    <label for="nombre">Nombre del Equipo:</label>
                    <input type="text" name="nombre" class="form-control" id="nombre">
                  </div>
                  <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" class="form-control">
                        <option>Pre-Veteranos</option>
                        <option>Veteranos</option>
                    </select>
                  </div>
                  
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Cargar</button>
          </div>
              </form>
        </div>
      </div>
    </div>
    
  </div>

  <div class="modal fade" id="editar_equipo">
      <div class="modal-dialog">
        <div class="modal-content">
        
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Editar Equipo</h4>
            <button type="button" class="close" data-dismiss="modal">×</button>
          </div>
          
          <!-- Modal body -->
          <div class="modal-body">
              
              <form action="<?= base_url() ?>equipos/editar" method="POST">
                  <div class="form-group">
                    <label for="Enombre">Nombre del Equipo:</label>
                    <input type="text" name="nombre" class="form-control" id="Enombre">
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="Eid_equipo" name="id">
                  </div>
                  <div class="form-group">
                    <label for="Efecha">Fecha de Ingreso:</label>
                    <input type="date" name="fecha" class="form-control" id="Efecha">
                  </div>
                  <div class="form-group">
                    <label for="Ecategoria">Categoria</label>
                    <select id="Ecategoria" name="categoria" class="form-control">
                        <option>Pre-Veteranos</option>
                        <option>Veteranos</option>
                    </select>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" id="Eestado" checked="" name="estado" type="checkbox"> Activar
                    </label>
                  </div>
                  
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
              </form>
        </div>
      </div>
    </div>
    
  </div>

</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>"
</script>