<?php

namespace App\Models;

use App\Traits\ModelTranalation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use ModelTranalation;
    public function __construct()
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
