<?php

namespace App\Models\Prep;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Question extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'PREP_QUESTIONS';
    protected $primaryKey ='questionId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'courseCode',
        'questionType',
        'A',
        'B',
        'C',
        'D',
        'answer',
        'questionStatus',
    ];

    protected $casts = [
    ];

//    public function questionType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
//    {
//        return $this->belongsTo(QuestionType::class, "questionQuestionTypeId", "questionTypeId");
//    }
}
