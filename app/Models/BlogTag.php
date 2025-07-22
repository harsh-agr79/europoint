<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['name'];

    /**
     * The blogs that belong to the tag.
     */
    public function blogs()
    {
       
    }
}
