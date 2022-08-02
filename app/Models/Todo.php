<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['title','description','category','done_at'];

    public function hasUser($user){
        if($user instanceof User)
            $user = $user->id;
        return UserTodo::where('todo',$this->id)->where('user',$user)->get(['user'])->isNotEmpty() ? User::find($user) : false;
    }
}
