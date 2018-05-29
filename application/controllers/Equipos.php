<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipos extends CI_Controller {

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
	public function index(){
		
		$this->load->model('equipo');
		$resultado = $this->equipo->equipos_todos();
		$data['equipos'] = $resultado;
		$data['equipo'] = '';

		$data1['viene'] = 'equipo';
		$this->load->view('structure/head', $data1);
		$this->load->view('equipo/equipos', $data);
		$this->load->view('structure/footer');

	}

	public function nuevo(){

		$this->load->model('equipo');
		
		if ($this->input->post()) {
	
			$nombre = $this->input->post('nombre');
			$categoria = $this->input->post('categoria');
			$fecha = date('Y-m-d');
			$estado = 1;
			
			//echo $nombre." ".$categoria." ".$fecha." ".$estado;	
			$this->equipo->nuevo($nombre, $categoria, $fecha, $estado);

		}
		redirect('equipos');

	}

	public function editar(){

		$this->load->model('equipo');	

		if ($this->input->post()) {

			$id = $this->input->post('id');
			$nombre = $this->input->post('nombre');
			$fecha_ingreso = $this->input->post('fecha');
			$categoria = $this->input->post('categoria');
			$estado = $this->input->post('estado');

			if ($estado == 'on') {
				$estado = 1;
			}else{
				$estado = 0;
			}
			$this->equipo->editar($id, $nombre, $fecha_ingreso, $categoria, $estado);
			
		}
		redirect('equipos');

	}


	public function eliminar(){

		$this->load->model('equipo');
		if ($this->input->is_ajax_request()) {
			
			if ($this->equipo->eliminar($this->input->post('id')) == 1) {
				echo 1;
			}else{
				echo 0;
			}
		}

	}

	public function mostrar($id){
		$this->load->model('equipo');
		
		$equipo = $this->equipo->buscar($id);
		$torneo = $this->equipo->participacion_torneo($id);

		//$datos_torneo = $this->equipo->posicion($id);

		$data['equipo'] = $equipo;
		$data['torneo'] = $torneo;
		//$data['datos'] = $datos_torneo;

		$data1['viene'] = 'equipo';
		$this->load->view('structure/head', $data1);
		$this->load->view('equipo/view', $data);
		$this->load->view('structure/footer');

	}

	public function activar(){
		$this->load->model('equipo');
		if ($this->input->is_ajax_request()) {
			
			$this->equipo->activar($this->input->post('id'));
			redirect("equipos");				
			
		}
	}

}
