<?php
 
namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class LocationPicture extends Model
{
    protected $table = "location_data";
 
    protected $fillable = ['location_picture'];
}