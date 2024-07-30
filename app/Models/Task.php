<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TodoList;

class Task extends Model
{
    use HasFactory;
	protected $fillable = ['list_id', 'title', 'description', 'is_done', 'due', 'priority'];

	public function todoList(){
		return $this->belongsTo(TodoList::class, 'list_id');
	}
}
