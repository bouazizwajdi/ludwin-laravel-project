<?php

namespace App\Models;

use App\Models\ReportGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $fillable=['name','logo','integration_code','description'];

  public function groups(){
    return $this->belongsToMany(Group::class);
}
 public function users(){
    return $this->belongsToMany(User::class);
}


}
