<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title','body','img','slug'];

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }

    public function state() {
        return $this->hasOne(State::class);
    }

}
