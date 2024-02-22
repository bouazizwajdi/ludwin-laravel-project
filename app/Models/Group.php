<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable=['name','file'];


    public function users(){
        return $this->hasMany(User::class);
    }
    public function reports(){
          return $this->belongsToMany(Report::class);
    }
    public function folders(){
        return $this->belongsToMany(Folder::class);
  }


}


