<?php

namespace App\Models;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;

class SocialAuth extends Model
{
    public function __construct(array $attributes = [])
    {
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
