<?php

namespace app\Controllers;

use app\Models\Contact;

class ContactsController extends Controller {

	public function index() {

		$model = new Contact();

		if (isset($_GET['search'])){
			$contacts = $model->where('name', 'LIKE', '%' . $_GET['search'] . '%')->paginate(1);
		}else{
			$contacts = $model->paginate(1);
		}
		return $this->view('contacts/index', compact('contacts'));

	}

	public function create() : string {
		return $this->view('contacts/create');
	}

	public function store() {
		$data = $_POST;

		$model = new Contact();

		$model->create($data);

		return $this->redirect('/contacts');
	}

	public function show($id) {
		$model = new Contact();

		$contact = $model->find($id);

		return $this->view('contacts/show', compact('contact'));
	}

	public function edit($id) {

		$model = new Contact();
		$contact = $model->find($id);

		return $this->view('contacts/edit', compact('contact'));
	}

	public function update($id) {
		$data = $_POST;

		$model = new Contact();
		$model->update($id, $data);

		$this->redirect("/contacts/{$id}");
		
	}

	public function destroy($id) {
		$model = new Contact();
		$model->delete($id);
		$this->redirect('/contacts');
	}
}
