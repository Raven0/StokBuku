<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bukus';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'harga_jual', 'harga_dasar'];
        
    public function Stok()
    {
        return $this->hasMany('App\Stok');
    }

    
}
