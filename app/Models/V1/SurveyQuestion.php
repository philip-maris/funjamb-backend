<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SurveyQuestion extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'DP_surveyQuestions';
    protected $primaryKey ='testId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'instruction',
        'questionType',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'answer',
        'questionStatus',
    ];

    protected $casts = [
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "userId", "userId");
    }
}
