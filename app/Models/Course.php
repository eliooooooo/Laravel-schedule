<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'name',
        'room',
        'formation_id',
    ];

    protected $casts = [
        'start' => 'datetime',
        'end' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }

    public function students()
    {
        return $this->from('students')
            ->join('group_student', 'students.id', '=', 'group_student.student_id')
            ->where('students.formation_id', $this->formation_id)
            ->where('group_student.group_id', $this->group_id)
            ->with('formation', 'group')
            ->get();
    }
}
