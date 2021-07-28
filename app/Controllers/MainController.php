<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class MainController extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}
	public function index()
	{
		return view('index', $this->getAllUsers());
	}
	public function getAllUsers()
	{
		//select * from users;
		$limit = $this->request->getVar('limit');
		$users = new User();
		if($limit === null){
			$limit = 5;
		}

		if (is_numeric($limit)) {
			if ($data['allUsers'] = $users->paginate($limit)) {
				$data['pager'] = $users->pager;
				return $data;
			} else {
				return 'unsuccessful';
			}
		} else {
			if ($data['allUsers'] = $users->paginate()) {
				$data['pager'] = $users->pager;
				return $data;
			} else {
				return 'unsuccessful';
			}
		}
	}
	public function getUser(int $id)
	{
		//select * from users where id= $id;
		$users = new User();
		if ($data['user'] = $users->find($id)) {
			return $data;
		} else {
			return 'unsuccessful';
		}
	}
	public function add()
	{
		return view('add');
	}
	public function update(int $id)
	{
		return view('update', $this->getUser($id));
	}
	public function delete(int $id)
	{
		return view('delete', $this->getUser($id));
	}
}
