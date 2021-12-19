<?php

namespace App\Repositories;

interface ProcessingFeesRepositoryInterface{

    public function getAllProcessingFees();

    public function showProcessingFee($id);

    public function storeProcessingFee($request);

    public function editProcessingFee($id);

    public function updateProcessingFee($request);

    public function deleteProcessingFee($request);

}
