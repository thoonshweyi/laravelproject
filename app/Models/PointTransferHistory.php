<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointTransferHistory extends Model
{
    use HasFactory;
    protected $table = "point_transfer_histories";
    protected $primaryKey = "id";
    protected $fillable = [
        "points_transfers_id",
        "user_id",
        "accounttype",
        "points"
    ];

    // public function sender(){
    //     return $this->belongsTo(User::class,"sender_id");
    // }

    public function students(){
        return $this->belongsTo(Student::class,"user_id","user_id");
    }
}
