<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'topic_id'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function scopeSearch(Builder $query, Request $request)
    {
        return $query->where(function ($query) use ($request) {

            return $query->when($request->search, function ($query) use ($request) {
                return $query->where(function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                });
            })->when($request->topic_id, function ($query) use ($request) {
                return $query->where('topic_id', $request->topic_id);
            });
        });
    }
}
