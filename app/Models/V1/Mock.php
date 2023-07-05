<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mock extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'DP_TESTS';
    protected $primaryKey ='testId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userId',
        'totalCorrectAnswers',
        'totalWrongAnswers',
        'score',
        'lexisScore',
        'comprehensionScore',
        'oralScore',
        'testStatus',
    ];

    protected $casts = [
    ];

    public function testType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MockType::class, "testMockTypeId", "testTypeId");
    }
}
