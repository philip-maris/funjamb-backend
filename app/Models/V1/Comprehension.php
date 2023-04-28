<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comprehension extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'DP_COMPREHENSION';
    protected $primaryKey ='comprehensionId';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'passage',
        'passageStatus',
    ];

    protected $casts = [
    ];

    public function questions(): HasMany
    {
        return $this->HasMany(ComprehensionQuestion::class, "comprehensionId", "comprehensionId");
    }
}
