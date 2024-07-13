<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Type Motor Controller
*| --------------------------------------------------------------------------
*| Type Motor site
*|
*/
class Type_motor extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_type_motor');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Type Motors
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('type_motor_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['type_motors'] = $this->model_type_motor->get($filter, $field, $this->limit_page, $offset);
		$this->data['type_motor_counts'] = $this->model_type_motor->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/type_motor/index/',
			'total_rows'   => $this->data['type_motor_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Type Motor List');
		$this->render('backend/standart/administrator/type_motor/type_motor_list', $this->data);
	}
	
	/**
	* Add new type_motors
	*
	*/
	public function add()
	{
		$this->is_allowed('type_motor_add');

		$this->template->title('Type Motor New');
		$this->render('backend/standart/administrator/type_motor/type_motor_add', $this->data);
	}

	/**
	* Add New Type Motors
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('type_motor', 'Type Motor', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_image_motor_name', 'Image Motor', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_informasi_umum_name', 'Informasi Umum', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_spesifikasi_teknis_name', 'Spesifikasi Teknis', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_pemeliharaan_name', 'Pemeliharaan', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_sistem_kelistrikan_name', 'Sistem Kelistrikan', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_pemecahan_masalah_name', 'Pemecahan Masalah', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$type_motor_image_motor_uuid = $this->input->post('type_motor_image_motor_uuid');
			$type_motor_image_motor_name = $this->input->post('type_motor_image_motor_name');
			$type_motor_informasi_umum_uuid = $this->input->post('type_motor_informasi_umum_uuid');
			$type_motor_informasi_umum_name = $this->input->post('type_motor_informasi_umum_name');
			$type_motor_spesifikasi_teknis_uuid = $this->input->post('type_motor_spesifikasi_teknis_uuid');
			$type_motor_spesifikasi_teknis_name = $this->input->post('type_motor_spesifikasi_teknis_name');
			$type_motor_pemeliharaan_uuid = $this->input->post('type_motor_pemeliharaan_uuid');
			$type_motor_pemeliharaan_name = $this->input->post('type_motor_pemeliharaan_name');
			$type_motor_sistem_kelistrikan_uuid = $this->input->post('type_motor_sistem_kelistrikan_uuid');
			$type_motor_sistem_kelistrikan_name = $this->input->post('type_motor_sistem_kelistrikan_name');
			$type_motor_pemecahan_masalah_uuid = $this->input->post('type_motor_pemecahan_masalah_uuid');
			$type_motor_pemecahan_masalah_name = $this->input->post('type_motor_pemecahan_masalah_name');
		
			$save_data = [
				'type_motor' => $this->input->post('type_motor'),
				'brand_motor' => $this->input->post('brand_motor'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/type_motor/')) {
				mkdir(FCPATH . '/uploads/type_motor/');
			}

			if (!empty($type_motor_image_motor_name)) {
				$type_motor_image_motor_name_copy = date('YmdHis') . '-' . $type_motor_image_motor_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_image_motor_uuid . '/' . $type_motor_image_motor_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_image_motor_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_image_motor_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image_motor'] = $type_motor_image_motor_name_copy;
			}
		
			if (!empty($type_motor_informasi_umum_name)) {
				$type_motor_informasi_umum_name_copy = date('YmdHis') . '-' . $type_motor_informasi_umum_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_informasi_umum_uuid . '/' . $type_motor_informasi_umum_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_informasi_umum_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_informasi_umum_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['informasi_umum'] = $type_motor_informasi_umum_name_copy;
			}
		
			if (!empty($type_motor_spesifikasi_teknis_name)) {
				$type_motor_spesifikasi_teknis_name_copy = date('YmdHis') . '-' . $type_motor_spesifikasi_teknis_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_spesifikasi_teknis_uuid . '/' . $type_motor_spesifikasi_teknis_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_spesifikasi_teknis_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_spesifikasi_teknis_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['spesifikasi_teknis'] = $type_motor_spesifikasi_teknis_name_copy;
			}
		
			if (!empty($type_motor_pemeliharaan_name)) {
				$type_motor_pemeliharaan_name_copy = date('YmdHis') . '-' . $type_motor_pemeliharaan_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_pemeliharaan_uuid . '/' . $type_motor_pemeliharaan_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_pemeliharaan_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_pemeliharaan_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['pemeliharaan'] = $type_motor_pemeliharaan_name_copy;
			}
		
			if (!empty($type_motor_sistem_kelistrikan_name)) {
				$type_motor_sistem_kelistrikan_name_copy = date('YmdHis') . '-' . $type_motor_sistem_kelistrikan_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_sistem_kelistrikan_uuid . '/' . $type_motor_sistem_kelistrikan_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_sistem_kelistrikan_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_sistem_kelistrikan_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['sistem_kelistrikan'] = $type_motor_sistem_kelistrikan_name_copy;
			}
		
			if (!empty($type_motor_pemecahan_masalah_name)) {
				$type_motor_pemecahan_masalah_name_copy = date('YmdHis') . '-' . $type_motor_pemecahan_masalah_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_pemecahan_masalah_uuid . '/' . $type_motor_pemecahan_masalah_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_pemecahan_masalah_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_pemecahan_masalah_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['pemecahan_masalah'] = $type_motor_pemecahan_masalah_name_copy;
			}
		
			
			$save_type_motor = $id = $this->model_type_motor->store($save_data);
            

			if ($save_type_motor) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_type_motor;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/type_motor/edit/' . $save_type_motor, 'Edit Type Motor'),
						anchor('administrator/type_motor', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/type_motor/edit/' . $save_type_motor, 'Edit Type Motor')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/type_motor');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/type_motor');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
		/**
	* Update view Type Motors
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('type_motor_update');

		$this->data['type_motor'] = $this->model_type_motor->find($id);

		$this->template->title('Type Motor Update');
		$this->render('backend/standart/administrator/type_motor/type_motor_update', $this->data);
	}

	/**
	* Update Type Motors
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('type_motor', 'Type Motor', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_image_motor_name', 'Image Motor', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_informasi_umum_name', 'Informasi Umum', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_spesifikasi_teknis_name', 'Spesifikasi Teknis', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_pemeliharaan_name', 'Pemeliharaan', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_sistem_kelistrikan_name', 'Sistem Kelistrikan', 'trim|required');
		

		$this->form_validation->set_rules('type_motor_pemecahan_masalah_name', 'Pemecahan Masalah', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$type_motor_image_motor_uuid = $this->input->post('type_motor_image_motor_uuid');
			$type_motor_image_motor_name = $this->input->post('type_motor_image_motor_name');
			$type_motor_informasi_umum_uuid = $this->input->post('type_motor_informasi_umum_uuid');
			$type_motor_informasi_umum_name = $this->input->post('type_motor_informasi_umum_name');
			$type_motor_spesifikasi_teknis_uuid = $this->input->post('type_motor_spesifikasi_teknis_uuid');
			$type_motor_spesifikasi_teknis_name = $this->input->post('type_motor_spesifikasi_teknis_name');
			$type_motor_pemeliharaan_uuid = $this->input->post('type_motor_pemeliharaan_uuid');
			$type_motor_pemeliharaan_name = $this->input->post('type_motor_pemeliharaan_name');
			$type_motor_sistem_kelistrikan_uuid = $this->input->post('type_motor_sistem_kelistrikan_uuid');
			$type_motor_sistem_kelistrikan_name = $this->input->post('type_motor_sistem_kelistrikan_name');
			$type_motor_pemecahan_masalah_uuid = $this->input->post('type_motor_pemecahan_masalah_uuid');
			$type_motor_pemecahan_masalah_name = $this->input->post('type_motor_pemecahan_masalah_name');
		
			$save_data = [
				'type_motor' => $this->input->post('type_motor'),
				'brand_motor' => $this->input->post('brand_motor'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/type_motor/')) {
				mkdir(FCPATH . '/uploads/type_motor/');
			}

			if (!empty($type_motor_image_motor_uuid)) {
				$type_motor_image_motor_name_copy = date('YmdHis') . '-' . $type_motor_image_motor_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_image_motor_uuid . '/' . $type_motor_image_motor_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_image_motor_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_image_motor_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['image_motor'] = $type_motor_image_motor_name_copy;
			}
		
			if (!empty($type_motor_informasi_umum_uuid)) {
				$type_motor_informasi_umum_name_copy = date('YmdHis') . '-' . $type_motor_informasi_umum_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_informasi_umum_uuid . '/' . $type_motor_informasi_umum_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_informasi_umum_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_informasi_umum_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['informasi_umum'] = $type_motor_informasi_umum_name_copy;
			}
		
			if (!empty($type_motor_spesifikasi_teknis_uuid)) {
				$type_motor_spesifikasi_teknis_name_copy = date('YmdHis') . '-' . $type_motor_spesifikasi_teknis_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_spesifikasi_teknis_uuid . '/' . $type_motor_spesifikasi_teknis_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_spesifikasi_teknis_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_spesifikasi_teknis_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['spesifikasi_teknis'] = $type_motor_spesifikasi_teknis_name_copy;
			}
		
			if (!empty($type_motor_pemeliharaan_uuid)) {
				$type_motor_pemeliharaan_name_copy = date('YmdHis') . '-' . $type_motor_pemeliharaan_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_pemeliharaan_uuid . '/' . $type_motor_pemeliharaan_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_pemeliharaan_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_pemeliharaan_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['pemeliharaan'] = $type_motor_pemeliharaan_name_copy;
			}
		
			if (!empty($type_motor_sistem_kelistrikan_uuid)) {
				$type_motor_sistem_kelistrikan_name_copy = date('YmdHis') . '-' . $type_motor_sistem_kelistrikan_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_sistem_kelistrikan_uuid . '/' . $type_motor_sistem_kelistrikan_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_sistem_kelistrikan_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_sistem_kelistrikan_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['sistem_kelistrikan'] = $type_motor_sistem_kelistrikan_name_copy;
			}
		
			if (!empty($type_motor_pemecahan_masalah_uuid)) {
				$type_motor_pemecahan_masalah_name_copy = date('YmdHis') . '-' . $type_motor_pemecahan_masalah_name;

				rename(FCPATH . 'uploads/tmp/' . $type_motor_pemecahan_masalah_uuid . '/' . $type_motor_pemecahan_masalah_name, 
						FCPATH . 'uploads/type_motor/' . $type_motor_pemecahan_masalah_name_copy);

				if (!is_file(FCPATH . '/uploads/type_motor/' . $type_motor_pemecahan_masalah_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['pemecahan_masalah'] = $type_motor_pemecahan_masalah_name_copy;
			}
		
			
			$save_type_motor = $this->model_type_motor->change($id, $save_data);

			if ($save_type_motor) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/type_motor', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/type_motor');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/type_motor');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = 'Opss validation failed';
			$this->data['errors'] = $this->form_validation->error_array();
		}

		$this->response($this->data);
	}
	
	/**
	* delete Type Motors
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('type_motor_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'type_motor'), 'success');
        } else {
            set_message(cclang('error_delete', 'type_motor'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Type Motors
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('type_motor_view');

		$this->data['type_motor'] = $this->model_type_motor->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Type Motor Detail');
		$this->render('backend/standart/administrator/type_motor/type_motor_view', $this->data);
	}
	
	/**
	* delete Type Motors
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$type_motor = $this->model_type_motor->find($id);

		if (!empty($type_motor->image_motor)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->image_motor;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($type_motor->informasi_umum)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->informasi_umum;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($type_motor->spesifikasi_teknis)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->spesifikasi_teknis;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($type_motor->pemeliharaan)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->pemeliharaan;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($type_motor->sistem_kelistrikan)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->sistem_kelistrikan;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		if (!empty($type_motor->pemecahan_masalah)) {
			$path = FCPATH . '/uploads/type_motor/' . $type_motor->pemecahan_masalah;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_type_motor->remove($id);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_image_motor_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'jpg|png',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_image_motor_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'image_motor', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_image_motor_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'image_motor', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_image_motor_file'
        ]);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_informasi_umum_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_informasi_umum_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'informasi_umum', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_informasi_umum_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'informasi_umum', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_informasi_umum_file'
        ]);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_spesifikasi_teknis_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_spesifikasi_teknis_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'spesifikasi_teknis', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_spesifikasi_teknis_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'spesifikasi_teknis', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_spesifikasi_teknis_file'
        ]);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_pemeliharaan_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_pemeliharaan_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'pemeliharaan', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_pemeliharaan_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'pemeliharaan', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_pemeliharaan_file'
        ]);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_sistem_kelistrikan_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_sistem_kelistrikan_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'sistem_kelistrikan', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_sistem_kelistrikan_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'sistem_kelistrikan', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_sistem_kelistrikan_file'
        ]);
	}
	
	/**
	* Upload Image Type Motor	* 
	* @return JSON
	*/
	public function upload_pemecahan_masalah_file()
	{
		if (!$this->is_allowed('type_motor_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'type_motor',
			'allowed_types' => 'pdf',
		]);
	}

	/**
	* Delete Image Type Motor	* 
	* @return JSON
	*/
	public function delete_pemecahan_masalah_file($uuid)
	{
		if (!$this->is_allowed('type_motor_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'pemecahan_masalah', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/'
        ]);
	}

	/**
	* Get Image Type Motor	* 
	* @return JSON
	*/
	public function get_pemecahan_masalah_file($id)
	{
		if (!$this->is_allowed('type_motor_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$type_motor = $this->model_type_motor->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'pemecahan_masalah', 
            'table_name'        => 'type_motor',
            'primary_key'       => 'id_type_motor',
            'upload_path'       => 'uploads/type_motor/',
            'delete_endpoint'   => 'administrator/type_motor/delete_pemecahan_masalah_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('type_motor_export');

		$this->model_type_motor->export(
			'type_motor', 
			'type_motor',
			$this->model_type_motor->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('type_motor_export');

		$this->model_type_motor->pdf('type_motor', 'type_motor');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('type_motor_export');

		$table = $title = 'type_motor';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_type_motor->find($id);
        $fields = $result->list_fields();

        $content = $this->pdf->loadHtmlPdf('core_template/pdf/pdf_single', [
            'data' => $data,
            'fields' => $fields,
            'title' => $title
        ], TRUE);

        $this->pdf->initialize($config);
        $this->pdf->pdf->SetDisplayMode('fullpage');
        $this->pdf->writeHTML($content);
        $this->pdf->Output($table.'.pdf', 'H');
	}

	
}


/* End of file type_motor.php */
/* Location: ./application/controllers/administrator/Type Motor.php */