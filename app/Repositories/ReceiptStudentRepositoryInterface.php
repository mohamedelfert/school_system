<?php

namespace App\Repositories;

interface ReceiptStudentRepositoryInterface{

    public function getAllReceipts();

    public function showReceipts($id);

    public function storeReceipt($request);

    public function editReceipt($id);

    public function updateReceipt($request);

    public function deleteReceipt($request);

}
