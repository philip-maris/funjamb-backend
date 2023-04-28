<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ComprehensionQuestion extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'DP_COMPREHENSION_QUESTIONS';
    protected $primaryKey ='questionId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question',
        'questionType',
        'optionA',
        'optionB',
        'optionC',
        'optionD',
        'answer',
        'comprehensionId',
        'questionStatus',
    ];

    protected $casts = [
    ];

    public function comprehenshion(): BelongsTo
    {
        return $this->belongsTo(Comprehension::class, "comprehensionId", "comprehensionId");
    }
}
