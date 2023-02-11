<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class post extends Model
{
    use HasFactory,softDeletes;
      use Sluggable;
    protected $fillable=[
'title','description','user_id','slug'];


    public function user(){
       return $this->belongsTo(User::class);
    }
//     public function getCreatedAtAttribute($date)
// {
//     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
// }

// public function getUpdatedAtAttribute($date)
// {
//     return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
// }
 public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
