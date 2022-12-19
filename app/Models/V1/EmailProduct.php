<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailProduct{
    public string $productImage;
    public string $productName;
    public string $productQuantity;
    public string $productTotalAmount;

    public function __construct($productName,$productImage,$productQuantity,$productTotalAmount){
        $this->productName = $productName;
        $this->productImage = $productImage;
        $this->productQuantity = $productQuantity;
        $this->productTotalAmount = $productTotalAmount;

    }
}
