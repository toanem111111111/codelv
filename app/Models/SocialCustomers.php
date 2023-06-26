<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCustomers extends Model
{
    use HasFactory;
    public  $timestamps=false;
    protected $fillable=[
        '','provider_user_id','provider_user_email','provider','id_customer',
    ];
    protected $primaryKey='id';
    protected $table='tbl_social_customer';


    public function customer(){
        return $this->belongsTo('App\Models\Order','id_customer','id_customer');
    }
}
