<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_surat');
	}

	public function indekssk()
	{
		if ($this->input->post('id_indeks') != "") {
			$id_indeks = $this->input->post('id_indeks');
			$data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', 'suratkeluar.id_indeks=' . $id_indeks)->result();
			$this->load->view('ajax/indekssk', $data);
		} else {
			$data['suratkeluar'] = $this->model_surat->getdata('suratkeluar')->result();
			$this->load->view('ajax/indekssk', $data);
		}
	}

	public function ajaxubahsk()
	{
		if (null !== $this->input->post('id_suratkeluar')) {
			$id_suratkeluar = $this->input->post('id_suratkeluar');
			$data['suratkeluar'] = $this->model_surat->getdatawithadd('suratkeluar', 'id_suratkeluar=' . $id_suratkeluar)->result();
			$data['indeks'] = $this->model_surat->getother('indeks')->result();
			$this->load->view('ajax/modalubahsk', $data);
		}
	}

	public function ajaxubahindeks()
	{
		if (null !== $this->input->post('id_indeks')) {
			$id_indeks = $this->input->post('id_indeks');
			$data['indeks'] = $this->model_surat->getotherwithadd('indeks', 'WHERE id_indeks=' . $id_indeks)->result();

			$this->load->view('ajax/modalubahindeks', $data);
		}
	}

	public function ajaxhapusindeks()
	{
		if (null !== $this->input->post('id_indeks')) {
			$id_indeks = $this->input->post('id_indeks');
			$data['indeks'] = $this->model_surat->getotherwithadd('indeks', 'WHERE id_indeks=' . $id_indeks)->result();

			$this->load->view('admin/pengaturan/hapusindeks', $data);
		}
	}

	public function ajaxeditprofil()
	{
		if (null !== $this->input->post('id_user')) {
			$id_user = $this->input->post('id_user');
			$data['profil'] = $this->model_surat->getotherwithadd('user', 'WHERE id_user=' . $id_user)->result();

			$this->load->view('ajax/modaleditprofil', $data);
		}
	}
}
