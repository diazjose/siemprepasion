<?php

class Equipo extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function cant_fecha($id_torneo = '')	{
		
			$number = $this->db->query("SELECT count(*) as number FROM equipo_torneo WHERE id_torneo = '$id_torneo'")->row()->number;
			return intval($number);
	}

	public function buscar_equipo($equipo){
		
		$resultado = $this->db->where('nombre_equipo', $equipo);
		$resultado = $this->db->get('equipo');
		return $resultado->row();

	}	

	public function buscar($id){

		$resultado = $this->db->where('id', $id);
		$resultado = $this->db->get('equipo');

		return $resultado->row();
	}

	public function equipos_todos(){

		$resultado = $this->db->where('categoria', 'Pre-veteranos');
		$resultado = $this->db->get('equipo');
		return $resultado;

	}

	public function cargar_equipo($torneo, $equipo, $orden){

		$resultado = $this->db->where('id_equipo', $equipo);
		$resultado = $this->db->where('id_torneo', $torneo);
		$resultado = $this->db->get('equipo_torneo');

		if ($resultado->num_rows() > 0 ) {
		
		}
		else{
			
			$insert = array('id_torneo' => $torneo,
						'id_equipo' => $equipo,
						'orden' => $orden);
			$this->db->insert('equipo_torneo', $insert);	
		}
		

	}

	public function nuevo($nombre, $categoria, $fecha, $estado){

		$insert = array('nombre_equipo' => $nombre ,
						 'fecha_ingreso' => $fecha, 
						 'categoria' => $categoria, 
						 'estado' => $estado );
		$this->db->insert('equipo', $insert);
	}

	public function eliminar($id){
		$resultado = $this->db->where('id_equipo', $id);
		$resultado = $this->db->get('equipo_torneo');

		if ($resultado->num_rows() == 0) {
			
			$this->db->delete('equipo', array('id' => $id));
			return 1;			
		}else{
			return 0;
		}

	}

	public function editar($id, $nombre, $fecha_ingreso, $categoria, $estado){
		$update = array('nombre_equipo' => $nombre,
						'fecha_ingreso' => $fecha_ingreso,
						'categoria' => $categoria,
						'estado' => $estado);
		$this->db->where('id', $id);
		$this->db->update('equipo', $update);
	}

	public function activar($id){

		$resultado = $this->db->where('id', $id);
		$resultado = $this->db->get('equipo');

		if ($resultado->row()->estado == 0) {
			$update = array("estado" => "1");
			$this->db->where("id", $id);
			$this->db->update("equipo",$update);
			return 1;
		}else{
			$update = array("estado" => "0");
			$this->db->where("id", $id);
			$this->db->update("equipo",$update);
			return 1;
		}

		


	}

	public function update_equipo($id, $nombre, $fecha_ingreso, $categoria, $estado){

		$update = array('nombre_equipo' => $nombre,
						'fecha_ingreso' => $fecha_ingreso,
						'categoria' => $categoria,
						'estado' => $estado);
		$this->db->where('id', $id);
		$this->db->update('equipo', $update);

	}

	public function participacion_torneo($id){

		$resultado = $this->db->query("SELECT c.nombre_torneo, c.fecha_inicio, c.anio, s.id_equipo, s.id_torneo
										FROM torneo c, equipo_torneo s 
											WHERE s.id_equipo = $id 
												AND c.id_torneo = s.id_torneo
													ORDER BY c.fecha_inicio");
		return $resultado->result();

	}

	public function posicion($id_equipo, $id_torneo){
		$resultado = $this->db->where('id_equipo', $id_equipo);
		$resultado = $this->db->where('id_torneo', $id_torneo);
		$resultado = $this->db->get('equipo_posicion');
		return $resultado->row();
	}

	public function mostrar($buscar){
		$resultado = $this->db->like('nombre_equipo', $buscar);
		$resultado = $this->db->get('equipo');
		return $resultado->result();
	}

}
