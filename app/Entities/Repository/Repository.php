<?php

namespace App\Entities\Repository;

use App\Profiyo\Entities\User;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $table = 'repositories';

    protected $fillable = ['type', 'link', 'descriptions', 'user_id', 'primary', 'deleted_at'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
