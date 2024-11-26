<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';
    protected $fillable = [
        'id',
        'project_id',
        'priority',
        'title',
        'description',
    ];
    protected $appends = [
        'created',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /*
        retornará uma diferença de tempo legível e amigável entre o tempo atual e o tempo fornecido.
        Por exemplo, "3 mins ago" ou "4 months ago" .
    */
    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

}
