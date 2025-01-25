<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spel extends Model
{
    use HasFactory;

    /**
     * De tabel die door het model wordt gebruikt.
     */
    protected $table = 'spellen';

    /**
     * De eigenschappen die massaal toewijsbaar zijn.
     */
    protected $fillable = [
        'title',
        'beschrijving',
        'status',
    ];

    /**
     * Definieer relaties met andere modellen.
     */

    // Een spel kan meerdere vragen hebben
    public function vragen()
    {
        return $this->hasMany(Vraag::class, 'spel_id');
    }

    // Voeg indien nodig extra relaties toe, zoals spelers of scores
}
