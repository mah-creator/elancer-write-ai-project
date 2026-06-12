<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['post_id', 'user_id', 'content', 'user_name'])]
class Comment extends Model
{
    use HasTimestamps;
}
