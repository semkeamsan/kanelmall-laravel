<?php

namespace App\Models;

use App\Traits\ModelTranalation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PermissionFormRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory,ModelTranalation;
    public $validation;
    protected $casts = ['routes' => 'collection'];
    public function __construct(array $attributes = [])
    {
        $this->validation = new PermissionFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
