<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stoks';

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
    protected $fillable = ['penerbit_id', 'buku_id', 'masuk_date', 'jumlah'];
    
    public function penerbit()
    {
        return $this->belongsTo('App\Penerbit');
    }
    
    public function buku()
    {
        return $this->belongsTo('App\Buku');
    }
    
}
