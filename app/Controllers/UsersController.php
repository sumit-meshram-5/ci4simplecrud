<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UsersController extends BaseController
{
	public function __construct()
	{
		helper(['url', 'form']);
	}

	public function insertUser()
	{
		//insert into users () set ();
		//validation directly from model
		$data['name'] = $this->request->getVar('name');
		$data['email'] = $this->request->getVar('email');

		$users = new User();
		if ($users->save($data) === false) {
			return view('add', ['error' => $users->errors()]);
		} else {
			return redirect()->to('/')->with('success', 'User created successfully');
		}
	}
	public function updateUser(int $id)
	{
		//update users values field=fieldvalue;
		$data['name'] = $this->request->getVar('name');
		$data['email'] = $this->request->getVar('email');

		$users = new User();
		if ($users->update($id, $data) === false) {
			return view('update', [
				'error' => $users->errors(),
				'user' => [
					'id' => $id,
				],
			]);
		} else {
			return redirect()->to('/')->with('success', 'User updated successfully');
		}
	}
	public function deleteUser(int $id)
	{
		//delete from users where $id=id;
		$users = new User();
		if ($users->delete($id)) {
			return redirect()->to('/')->with('success', 'User deleted successfully');
		} else {
			return redirect()->to('/')->with('fail', 'User delete fail');
		}
	}
}
