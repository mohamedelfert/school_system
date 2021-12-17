<?php

namespace App\Repositories;

interface StudyFeesRepositoryInterface{

    public function getAllFees();

    public function createFees();

    public function storeFees($request);

    public function showStudentsFees($id);

    public function editFees($id);

    public function updateFees($request);

    public function deleteFees($request);
}
