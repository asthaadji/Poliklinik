<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    use HasFactory;

    protected $table = 'table_dokter';
    protected $fillable = ['name', 'alamat', 'no_hp','id_poli'];

    public function poli()
    {
        return $this->belongsTo(PoliModel::class, 'id_poli');
    }
}
