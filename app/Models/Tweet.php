<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// 省略

class Tweet extends Model
{
  use HasFactory;

  protected $fillable = ['tweet'];

  // 🔽 1対多の関係
  public function comments()
  {
    return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
  }
}