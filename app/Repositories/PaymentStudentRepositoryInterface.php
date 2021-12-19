<?php

namespace App\Repositories;

interface PaymentStudentRepositoryInterface{

    public function getAllPayments();

    public function showPayment($id);

    public function storePayment($request);

    public function editPayment($id);

    public function updatePayment($request);

    public function deletePayment($request);

}
