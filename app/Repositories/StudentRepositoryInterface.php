<?php

namespace App\Repositories;

interface StudentRepositoryInterface {

    public function getAllStudents();

    public function createStudent();

    public function storeStudent($request);

    public function showStudent($id);

    public function editStudent($id);

    public function updateStudent($request);

    public function deleteStudent($request);

    public function getChapters($id);

    public function getSections($id);

    public function uploadAttachments($request);

    public function showPhoto($student_name,$file_name);

    public function download($student_name,$file_name);

    public function deletePhoto($request);

    public function delete_checked_students($request);

    public function filter_students($request);
}
