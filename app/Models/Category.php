<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

      /**
         * Get all of the todos for the CategoryController
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function tasks()
        {
            return $this->hasMany(Task::class);
        }

}
