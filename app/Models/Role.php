<?php

namespace App\Models;
use App\Traits\ModelTranalation;
use App\Http\Requests\RoleFormRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,ModelTranalation;
    public $validation;
    public function __construct(array $attributes = [])
    {
        $this->validation = new RoleFormRequest;
        $this->fillable = Schema::getColumnListing($this->getTable());
        parent::__construct($attributes);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'role_id')->orderBy('index');
    }
}
