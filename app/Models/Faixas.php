<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Faixas extends Model

{
        use HasFactory;

        protected $fillable = [
                'nome',
                'album',
                'artista',
                'slug',
                'id_categoria',
              
            ];

            
        public function categoria(){
                return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
        }

    }
