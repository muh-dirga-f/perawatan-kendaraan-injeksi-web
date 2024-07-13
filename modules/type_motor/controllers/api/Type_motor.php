<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Type_motor extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_type_motor');
	}

	/**
	 * @api {get} /type_motor/all Get all type_motors.
	 * @apiVersion 0.1.0
	 * @apiName AllTypemotor 
	 * @apiGroup type_motor
	 * @apiHeader {String} X-Api-Key Type motors unique access-key.
	 * @apiPermission Type motor Cant be Accessed permission name : api_type_motor_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Type motors.
	 * @apiParam {String} [Field="All Field"] Optional field of Type motors : id_type_motor, type_motor, brand_motor, image_motor, pemecahan_masalah, sistem_kelistrikan, pemeliharaan, spesifikasi_teknis, informasi_umum.
	 * @apiParam {String} [Start=0] Optional start index of Type motors.
	 * @apiParam {String} [Limit=10] Optional limit data of Type motors.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of type_motor.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataType motor Type motor data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_type_motor_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id_type_motor', 'type_motor', 'brand_motor', 'image_motor', 'pemecahan_masalah', 'sistem_kelistrikan', 'pemeliharaan', 'spesifikasi_teknis', 'informasi_umum'];
		$type_motors = $this->model_api_type_motor->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_type_motor->count_all($filter, $field);
		$type_motors = array_map(function($row){
						
			return $row;
		}, $type_motors);

		$data['type_motor'] = $type_motors;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Type motor',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /type_motor/detail Detail Type motor.
	 * @apiVersion 0.1.0
	 * @apiName DetailType motor
	 * @apiGroup type_motor
	 * @apiHeader {String} X-Api-Key Type motors unique access-key.
	 * @apiPermission Type motor Cant be Accessed permission name : api_type_motor_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Type motors.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of type_motor.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError Type motorNotFound Type motor data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_type_motor_detail', false);

		$this->requiredInput(['id_type_motor']);

		$id = $this->get('id_type_motor');

		$select_field = ['id_type_motor', 'type_motor', 'brand_motor', 'image_motor', 'pemecahan_masalah', 'sistem_kelistrikan', 'pemeliharaan', 'spesifikasi_teknis', 'informasi_umum'];
		$type_motor = $this->model_api_type_motor->find($id, $select_field);

		if (!$type_motor) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['type_motor'] = $type_motor;
		if ($data['type_motor']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Type motor',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Type motor not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /type_motor/add Add Type motor.
	 * @apiVersion 0.1.0
	 * @apiName AddType motor
	 * @apiGroup type_motor
	 * @apiHeader {String} X-Api-Key Type motors unique access-key.
	 * @apiPermission Type motor Cant be Accessed permission name : api_type_motor_add
	 *
 	 * @apiParam {String} Type_motor Mandatory type_motor of Type motors.  
	 * @apiParam {String} Brand_motor Mandatory brand_motor of Type motors.  
	 * @apiParam {String} Image_motor Mandatory image_motor of Type motors.  
	 * @apiParam {String} Pemecahan_masalah Mandatory pemecahan_masalah of Type motors.  
	 * @apiParam {String} Sistem_kelistrikan Mandatory sistem_kelistrikan of Type motors.  
	 * @apiParam {String} Pemeliharaan Mandatory pemeliharaan of Type motors.  
	 * @apiParam {String} Spesifikasi_teknis Mandatory spesifikasi_teknis of Type motors.  
	 * @apiParam {String} Informasi_umum Mandatory informasi_umum of Type motors.  
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function add_post()
	{
		$this->is_allowed('api_type_motor_add', false);

		$this->form_validation->set_rules('type_motor', 'Type Motor', 'trim|required');
		$this->form_validation->set_rules('brand_motor', 'Brand Motor', 'trim|required');
		$this->form_validation->set_rules('image_motor', 'Image Motor', 'trim|required');
		$this->form_validation->set_rules('pemecahan_masalah', 'Pemecahan Masalah', 'trim|required');
		$this->form_validation->set_rules('sistem_kelistrikan', 'Sistem Kelistrikan', 'trim|required');
		$this->form_validation->set_rules('pemeliharaan', 'Pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('spesifikasi_teknis', 'Spesifikasi Teknis', 'trim|required');
		$this->form_validation->set_rules('informasi_umum', 'Informasi Umum', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'type_motor' => $this->input->post('type_motor'),
				'brand_motor' => $this->input->post('brand_motor'),
				'image_motor' => $this->input->post('image_motor'),
				'pemecahan_masalah' => $this->input->post('pemecahan_masalah'),
				'sistem_kelistrikan' => $this->input->post('sistem_kelistrikan'),
				'pemeliharaan' => $this->input->post('pemeliharaan'),
				'spesifikasi_teknis' => $this->input->post('spesifikasi_teknis'),
				'informasi_umum' => $this->input->post('informasi_umum'),
			];
			
			$save_type_motor = $this->model_api_type_motor->store($save_data);

			if ($save_type_motor) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully stored into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	/**
	 * @api {post} /type_motor/update Update Type motor.
	 * @apiVersion 0.1.0
	 * @apiName UpdateType motor
	 * @apiGroup type_motor
	 * @apiHeader {String} X-Api-Key Type motors unique access-key.
	 * @apiPermission Type motor Cant be Accessed permission name : api_type_motor_update
	 *
	 * @apiParam {String} Type_motor Mandatory type_motor of Type motors.  
	 * @apiParam {String} Brand_motor Mandatory brand_motor of Type motors.  
	 * @apiParam {String} Image_motor Mandatory image_motor of Type motors.  
	 * @apiParam {String} Pemecahan_masalah Mandatory pemecahan_masalah of Type motors.  
	 * @apiParam {String} Sistem_kelistrikan Mandatory sistem_kelistrikan of Type motors.  
	 * @apiParam {String} Pemeliharaan Mandatory pemeliharaan of Type motors.  
	 * @apiParam {String} Spesifikasi_teknis Mandatory spesifikasi_teknis of Type motors.  
	 * @apiParam {String} Informasi_umum Mandatory informasi_umum of Type motors.  
	 * @apiParam {Integer} id_type_motor Mandatory id_type_motor of Type Motor.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function update_post()
	{
		$this->is_allowed('api_type_motor_update', false);

		
		$this->form_validation->set_rules('type_motor', 'Type Motor', 'trim|required');
		$this->form_validation->set_rules('brand_motor', 'Brand Motor', 'trim|required');
		$this->form_validation->set_rules('image_motor', 'Image Motor', 'trim|required');
		$this->form_validation->set_rules('pemecahan_masalah', 'Pemecahan Masalah', 'trim|required');
		$this->form_validation->set_rules('sistem_kelistrikan', 'Sistem Kelistrikan', 'trim|required');
		$this->form_validation->set_rules('pemeliharaan', 'Pemeliharaan', 'trim|required');
		$this->form_validation->set_rules('spesifikasi_teknis', 'Spesifikasi Teknis', 'trim|required');
		$this->form_validation->set_rules('informasi_umum', 'Informasi Umum', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'type_motor' => $this->input->post('type_motor'),
				'brand_motor' => $this->input->post('brand_motor'),
				'image_motor' => $this->input->post('image_motor'),
				'pemecahan_masalah' => $this->input->post('pemecahan_masalah'),
				'sistem_kelistrikan' => $this->input->post('sistem_kelistrikan'),
				'pemeliharaan' => $this->input->post('pemeliharaan'),
				'spesifikasi_teknis' => $this->input->post('spesifikasi_teknis'),
				'informasi_umum' => $this->input->post('informasi_umum'),
			];
			
			$save_type_motor = $this->model_api_type_motor->change($this->post('id_type_motor'), $save_data);

			if ($save_type_motor) {
				$this->response([
					'status' 	=> true,
					'message' 	=> 'Your data has been successfully updated into the database'
				], API::HTTP_OK);

			} else {
				$this->response([
					'status' 	=> false,
					'message' 	=> cclang('data_not_change')
				], API::HTTP_NOT_ACCEPTABLE);
			}

		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Validation Errors.',
				'errors' 	=> $this->form_validation->error_array()
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
	/**
	 * @api {post} /type_motor/delete Delete Type motor. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteType motor
	 * @apiGroup type_motor
	 * @apiHeader {String} X-Api-Key Type motors unique access-key.
	 	 * @apiPermission Type motor Cant be Accessed permission name : api_type_motor_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Type motors .
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError ValidationError Error validation.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function delete_post()
	{
		$this->is_allowed('api_type_motor_delete', false);

		$type_motor = $this->model_api_type_motor->find($this->post('id_type_motor'));

		if (!$type_motor) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Type motor not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_type_motor->remove($this->post('id_type_motor'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Type motor deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Type motor not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Type motor.php */
/* Location: ./application/controllers/api/Type motor.php */