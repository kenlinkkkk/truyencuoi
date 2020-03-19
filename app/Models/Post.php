<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const FREE_CONTENT_CODE = 0;
    const FREE_CONTENT_MESSAGE = 'Miễn phí';
    const PAY_CONTENT_CODE = 1;
    const PAY_CONTENT_MESSAGE = 'Trả phí';

    protected $table = 'posts';

    protected $fillable = [
        'name', 'short_tag', 'content', 'picture', 'counter', 'status', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
