<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /*public function proyecto(){
        return $this->hasMany('App\Proyecto','id_proyecto');
    }*/
}
