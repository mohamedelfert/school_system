<?php

namespace App\Repositories;

interface StudentRepositoryInterface {

    public function getAllStudents();

    public function createStudent();

    public function storeStudent($request);

    public function editStudent($id);

    public function updateStudent($request);

    public function deleteStudent($request);

    public function getAllChapters($id);

    public function getAllSections($id);
}
