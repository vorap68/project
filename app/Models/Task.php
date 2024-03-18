<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','category_id','user_id','user_access_id','deadline','done','busy',
    ];
    protected $casts = [
        'user_access_id' => 'array',
    ];


        /** Get the category for this todo
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function category()
        {
            return $this->belongsTo(Category::class);
        }

        public function users()
        {
            return $this->belongsToMany(User::class);
        }

}
