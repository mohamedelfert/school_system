<?php

namespace App\Repositories;

interface TeacherRepositoryInterface {

    public function getAllTeachers();

    public function getAllSpecializations();

    public function getAllGenders();

    public function storeTeacher($request);

    public function editTeacher($id);

    public function updateTeacher($request);

    public function deleteTeacher($request);

}
