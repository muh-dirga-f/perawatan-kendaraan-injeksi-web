<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Firebase\JWT\JWT;

class Brand extends API
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_api_brand');
	}

	/**
	 * @api {get} /brand/all Get all brands.
	 * @apiVersion 0.1.0
	 * @apiName AllBrand 
	 * @apiGroup brand
	 * @apiHeader {String} X-Api-Key Brands unique access-key.
	 * @apiPermission Brand Cant be Accessed permission name : api_brand_all
	 *
	 * @apiParam {String} [Filter=null] Optional filter of Brands.
	 * @apiParam {String} [Field="All Field"] Optional field of Brands : id_brand, brand, logo.
	 * @apiParam {String} [Start=0] Optional start index of Brands.
	 * @apiParam {String} [Limit=10] Optional limit data of Brands.
	 *
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of brand.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError NoDataBrand Brand data is nothing.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function all_get()
	{
		$this->is_allowed('api_brand_all', false);

		$filter = $this->get('filter');
		$field = $this->get('field');
		$limit = $this->get('limit') ? $this->get('limit') : $this->limit_page;
		$start = $this->get('start');

		$select_field = ['id_brand', 'brand', 'logo'];
		$brands = $this->model_api_brand->get($filter, $field, $limit, $start, $select_field);
		$total = $this->model_api_brand->count_all($filter, $field);
		$brands = array_map(function($row){
						
			return $row;
		}, $brands);

		$data['brand'] = $brands;
				
		$this->response([
			'status' 	=> true,
			'message' 	=> 'Data Brand',
			'data'	 	=> $data,
			'total' 	=> $total,
		], API::HTTP_OK);
	}

		/**
	 * @api {get} /brand/detail Detail Brand.
	 * @apiVersion 0.1.0
	 * @apiName DetailBrand
	 * @apiGroup brand
	 * @apiHeader {String} X-Api-Key Brands unique access-key.
	 * @apiPermission Brand Cant be Accessed permission name : api_brand_detail
	 *
	 * @apiParam {Integer} Id Mandatory id of Brands.
	 *
	 * @apiSuccess {Boolean} Status status response api.
	 * @apiSuccess {String} Message message response api.
	 * @apiSuccess {Array} Data data of brand.
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *
	 * @apiError BrandNotFound Brand data is not found.
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 403 Not Acceptable
	 *
	 */
	public function detail_get()
	{
		$this->is_allowed('api_brand_detail', false);

		$this->requiredInput(['id_brand']);

		$id = $this->get('id_brand');

		$select_field = ['id_brand', 'brand', 'logo'];
		$brand = $this->model_api_brand->find($id, $select_field);

		if (!$brand) {
			$this->response([
					'status' 	=> false,
					'message' 	=> 'Blog not found'
				], API::HTTP_NOT_FOUND);
		}

					
		$data['brand'] = $brand;
		if ($data['brand']) {
			
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Detail Brand',
				'data'	 	=> $data
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Brand not found'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}

	
	/**
	 * @api {post} /brand/add Add Brand.
	 * @apiVersion 0.1.0
	 * @apiName AddBrand
	 * @apiGroup brand
	 * @apiHeader {String} X-Api-Key Brands unique access-key.
	 * @apiPermission Brand Cant be Accessed permission name : api_brand_add
	 *
 	 * @apiParam {String} Brand Mandatory brand of Brands.  
	 * @apiParam {String} Logo Mandatory logo of Brands.  
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
		$this->is_allowed('api_brand_add', false);

		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('logo', 'Logo', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'brand' => $this->input->post('brand'),
				'logo' => $this->input->post('logo'),
			];
			
			$save_brand = $this->model_api_brand->store($save_data);

			if ($save_brand) {
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
	 * @api {post} /brand/update Update Brand.
	 * @apiVersion 0.1.0
	 * @apiName UpdateBrand
	 * @apiGroup brand
	 * @apiHeader {String} X-Api-Key Brands unique access-key.
	 * @apiPermission Brand Cant be Accessed permission name : api_brand_update
	 *
	 * @apiParam {String} Brand Mandatory brand of Brands.  
	 * @apiParam {String} Logo Mandatory logo of Brands.  
	 * @apiParam {Integer} id_brand Mandatory id_brand of Brand.
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
		$this->is_allowed('api_brand_update', false);

		
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('logo', 'Logo', 'trim|required');
		
		if ($this->form_validation->run()) {

			$save_data = [
				'brand' => $this->input->post('brand'),
				'logo' => $this->input->post('logo'),
			];
			
			$save_brand = $this->model_api_brand->change($this->post('id_brand'), $save_data);

			if ($save_brand) {
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
	 * @api {post} /brand/delete Delete Brand. 
	 * @apiVersion 0.1.0
	 * @apiName DeleteBrand
	 * @apiGroup brand
	 * @apiHeader {String} X-Api-Key Brands unique access-key.
	 	 * @apiPermission Brand Cant be Accessed permission name : api_brand_delete
	 *
	 * @apiParam {Integer} Id Mandatory id of Brands .
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
		$this->is_allowed('api_brand_delete', false);

		$brand = $this->model_api_brand->find($this->post('id_brand'));

		if (!$brand) {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Brand not found'
			], API::HTTP_NOT_ACCEPTABLE);
		} else {
			$delete = $this->model_api_brand->remove($this->post('id_brand'));

			}
		
		if ($delete) {
			$this->response([
				'status' 	=> true,
				'message' 	=> 'Brand deleted',
			], API::HTTP_OK);
		} else {
			$this->response([
				'status' 	=> false,
				'message' 	=> 'Brand not delete'
			], API::HTTP_NOT_ACCEPTABLE);
		}
	}
	
}

/* End of file Brand.php */
/* Location: ./application/controllers/api/Brand.php */