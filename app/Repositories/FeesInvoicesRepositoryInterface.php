<?php

namespace App\Repositories;

interface FeesInvoicesRepositoryInterface{

    public function getAllFeesInvoices();

    public function showFeesInvoice($id);

    public function storeFeesInvoice($request);

    public function editFeesInvoice($id);

    public function updateFeesInvoice($request);

    public function deleteFeesInvoice($request);
}
