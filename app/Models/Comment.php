<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function entity()
    {
      return $this->morphTo();
    }

    public function parent()
    {
      $parent = '';
      if(!empty($this->comment->parent_id)){
        $parent = Comment::findOrFail($this->comment->parent_id);
      }
      return $parent;
    }

    public function children()
    {
      $comments = Comment::where('parent_id',$this->id)->get();

      return $comments;
    }
}
