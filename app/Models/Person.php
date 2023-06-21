<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder; //追記
use App\Scopes\ScopePerson; //追記

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    public function getData()
    {
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }

    public function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age','>=', $n);
    }

    public function scopeAgeLessThan($query, $n)
    {
        return $query->where('age','<=', $n);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }
}

// protected static function boot()
// {
//     parent::boot();

//     static::addGlobalScope('age', function (Builder $builder){
//         $builder->where('age', '>', 10);
//     });
// }