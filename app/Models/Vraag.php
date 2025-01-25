<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vraag extends Model
{
    use HasFactory;

    protected $table = 'vragen'; // Tabelnaam blijft in het Nederlands
    protected $fillable = [
        'spel_id',
        'inhoud',
        'type',
        'punten',
        'qr_code_url',
    ];

    public function spel()
    {
        return $this->belongsTo(Spel::class, 'spel_id');
    }
}
