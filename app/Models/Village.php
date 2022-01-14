<?php

namespace App\Models;
use App\Traits\ModelTranalation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use ModelTranalation;
    public function __construct()
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
    }
}
