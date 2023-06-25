<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        'name_customer','email_customer','password_customer','phone_customer',
    ];
    protected $primaryKey='id_customer';
    protected $table='tbl_customer';

    public function order_customer(){
        return $this->hasMany('App\Models\Order');
    }

}
