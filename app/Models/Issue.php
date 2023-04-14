<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];
    protected $appends= ['att'];



    public function reporter()
    {
        return $this->belongsTo(User::class,'reporter_id'); //glue key is same in the 2 models
    }

    public function getAttAttribute()
    {
        return asset("/storage/{$this->attachments}");
    }


    public function scopeFilter(Builder $query, array $filters) :Builder
    {
        return $query->when($filters['title'] ?? false, fn ($query, $value) => $query->where('title', 'LIKE','%'.$value.'%'))
            ->when($filters['statuses'] ?? false, fn ($query,$value) => $query->where('status',$value))
            ->when($filters['priority'] ?? false, fn ($query,$value) => $query->where('priority',$value))
            ->when($filters['departments'] ?? false, fn ($query,$value) => $query->where('department', $value))
            ->when($filters['reporters'] ?? false, fn ($query,$value) => $query->where('reporter_id',$value))
            ->when($filters['statuses'] ?? false, fn ($query, $value) => $query->where('status',$value));
    }


    public function scopeTest(Builder $query): Builder
    {
       return $query->orderBy('updated_at','desc');
    }


}


