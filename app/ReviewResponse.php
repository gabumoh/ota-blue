<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewResponse extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'review_responses'; 
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }
}