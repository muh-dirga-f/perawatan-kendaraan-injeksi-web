<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Brand Controller
*| --------------------------------------------------------------------------
*| Brand site
*|
*/
class Brand extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_brand');
		$this->load->model('group/model_group');
		$this->lang->load('web_lang', $this->current_lang);
	}

	/**
	* show all Brands
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('brand_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['brands'] = $this->model_brand->get($filter, $field, $this->limit_page, $offset);
		$this->data['brand_counts'] = $this->model_brand->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/brand/index/',
			'total_rows'   => $this->data['brand_counts'],
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Brand List');
		$this->render('backend/standart/administrator/brand/brand_list', $this->data);
	}
	
	/**
	* Add new brands
	*
	*/
	public function add()
	{
		$this->is_allowed('brand_add');

		$this->template->title('Brand New');
		$this->render('backend/standart/administrator/brand/brand_add', $this->data);
	}

	/**
	* Add New Brands
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('brand_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		

		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		

		$this->form_validation->set_rules('brand_logo_name', 'Logo', 'trim|required');
		

		

		if ($this->form_validation->run()) {
			$brand_logo_uuid = $this->input->post('brand_logo_uuid');
			$brand_logo_name = $this->input->post('brand_logo_name');
		
			$save_data = [
				'brand' => $this->input->post('brand'),
			];

			
			



			
			if (!is_dir(FCPATH . '/uploads/brand/')) {
				mkdir(FCPATH . '/uploads/brand/');
			}

			if (!empty($brand_logo_name)) {
				$brand_logo_name_copy = date('YmdHis') . '-' . $brand_logo_name;

				rename(FCPATH . 'uploads/tmp/' . $brand_logo_uuid . '/' . $brand_logo_name, 
						FCPATH . 'uploads/brand/' . $brand_logo_name_copy);

				if (!is_file(FCPATH . '/uploads/brand/' . $brand_logo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo'] = $brand_logo_name_copy;
			}
		
			
			$save_brand = $id = $this->model_brand->store($save_data);
            

			if ($save_brand) {
				
				
					
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_brand;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/brand/edit/' . $save_brand, 'Edit Brand'),
						anchor('administrator/brand', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/brand/edit/' . $save_brand, 'Edit Brand')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/brand');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/brand');
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
	* Update view Brands
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('brand_update');

		$this->data['brand'] = $this->model_brand->find($id);

		$this->template->title('Brand Update');
		$this->render('backend/standart/administrator/brand/brand_update', $this->data);
	}

	/**
	* Update Brands
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('brand_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
				$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		

		$this->form_validation->set_rules('brand_logo_name', 'Logo', 'trim|required');
		

		
		if ($this->form_validation->run()) {
			$brand_logo_uuid = $this->input->post('brand_logo_uuid');
			$brand_logo_name = $this->input->post('brand_logo_name');
		
			$save_data = [
				'brand' => $this->input->post('brand'),
			];

			

			


			
			if (!is_dir(FCPATH . '/uploads/brand/')) {
				mkdir(FCPATH . '/uploads/brand/');
			}

			if (!empty($brand_logo_uuid)) {
				$brand_logo_name_copy = date('YmdHis') . '-' . $brand_logo_name;

				rename(FCPATH . 'uploads/tmp/' . $brand_logo_uuid . '/' . $brand_logo_name, 
						FCPATH . 'uploads/brand/' . $brand_logo_name_copy);

				if (!is_file(FCPATH . '/uploads/brand/' . $brand_logo_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['logo'] = $brand_logo_name_copy;
			}
		
			
			$save_brand = $this->model_brand->change($id, $save_data);

			if ($save_brand) {

				

				
				
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/brand', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/brand');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/brand');
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
	* delete Brands
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('brand_delete');

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
            set_message(cclang('has_been_deleted', 'brand'), 'success');
        } else {
            set_message(cclang('error_delete', 'brand'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Brands
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('brand_view');

		$this->data['brand'] = $this->model_brand->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Brand Detail');
		$this->render('backend/standart/administrator/brand/brand_view', $this->data);
	}
	
	/**
	* delete Brands
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$brand = $this->model_brand->find($id);

		if (!empty($brand->logo)) {
			$path = FCPATH . '/uploads/brand/' . $brand->logo;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_brand->remove($id);
	}
	
	/**
	* Upload Image Brand	* 
	* @return JSON
	*/
	public function upload_logo_file()
	{
		if (!$this->is_allowed('brand_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'brand',
			'allowed_types' => 'jpg|png',
		]);
	}

	/**
	* Delete Image Brand	* 
	* @return JSON
	*/
	public function delete_logo_file($uuid)
	{
		if (!$this->is_allowed('brand_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'logo', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'brand',
            'primary_key'       => 'id_brand',
            'upload_path'       => 'uploads/brand/'
        ]);
	}

	/**
	* Get Image Brand	* 
	* @return JSON
	*/
	public function get_logo_file($id)
	{
		if (!$this->is_allowed('brand_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$brand = $this->model_brand->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'logo', 
            'table_name'        => 'brand',
            'primary_key'       => 'id_brand',
            'upload_path'       => 'uploads/brand/',
            'delete_endpoint'   => 'administrator/brand/delete_logo_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('brand_export');

		$this->model_brand->export(
			'brand', 
			'brand',
			$this->model_brand->field_search
		);
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('brand_export');

		$this->model_brand->pdf('brand', 'brand');
	}


	public function single_pdf($id = null)
	{
		$this->is_allowed('brand_export');

		$table = $title = 'brand';
		$this->load->library('HtmlPdf');
      
        $config = array(
            'orientation' => 'p',
            'format' => 'a4',
            'marges' => array(5, 5, 5, 5)
        );

        $this->pdf = new HtmlPdf($config);
        $this->pdf->setDefaultFont('stsongstdlight'); 

        $result = $this->db->get($table);
       
        $data = $this->model_brand->find($id);
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


/* End of file brand.php */
/* Location: ./application/controllers/administrator/Brand.php */