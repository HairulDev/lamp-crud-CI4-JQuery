<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\OrangModel;

class Orang extends ResourceController
{
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	use ResponseTrait;
	// public function index()
	// {
	// 	$model = new OrangModel();
	// 	$data = $model->findAll();
	// 	if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
	// 	return $this->respond($data);
	// }
	public function index()
	{
		return view('orang/orang_view');
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		if ($id) {
			$model = new OrangModel();
			$data = $model->find(['id' => $id]);
			if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
			return $this->respond($data[0]);
		} else {
			$model = new OrangModel();
			$data = $model->orderBy('firstName', 'ASC')->findAll();
			if (!$data) return $this->failNotFound('Data Tidak Ditemukan');
			return $this->respond($data);
		}
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */

	public function create()
	{
		$json = $this->request->getJSON();
		$data = [
			'firstName' => $json->firstName,
			'hobi' => $json->hobi,
			'dob' => $json->dob
			// 'firstName' => $this->request->getVar('firstName'),
			// 'hobi' => $this->request->getVar('hobi'),
			// 'dob' => $this->request->getVar('dob')
		];
		
		$model = new OrangModel();
		$product = $model->insert($data);
		if (!$product) return $this->fail('Gagal tersimpan', 400);
		// return $this->respondCreated($product);
		return $this->respondCreated([
			'status' => true,
			'message' => 'Save done'
		]);
	}

	/**	
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		$json = $this->request->getJSON();
		$data = [
			'firstName' => $json->firstName,
			// 'gender' => $json->gender,
			'hobi' => $json->hobi,
			'dob' => $json->dob
		];
		$model = new OrangModel();
		$cekId = $model->find(['id' => $id]);
		if (!$cekId) return $this->fail('Data Tidak ditemukan', 404);
		$product = $model->update($id, $data);
		if (!$product) return $this->fail('Gagal terupdate', 400);
		// return $this->respond($product);
		return $this->respond([
			'status' => true,
			'message' => 'Update done'
		]);
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		$model = new OrangModel();
		$cekId = $model->find(['id' => $id]);
		if (!$cekId) return $this->fail('Data Tidak ditemukan', 404);
		$product = $model->delete($id);
		if (!$product) return $this->fail('Gagal terhapus', 400);
		// return $this->respondDeleted($product);
		return $this->respondDeleted([
			'status' => true,
			'message' => 'Deleted done'
		]);
	}
}
