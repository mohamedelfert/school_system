<?php

namespace App\Repositories;

interface FeesInvoicesRepositoryInterface{

    public function getAllFeesInvoices();

    public function showFeesInvoice($id);

    public function storeFeesInvoice($request);
}
