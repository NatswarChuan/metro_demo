<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteModel extends Model
{
    use HasFactory;

    protected $table = 'routes';
    protected $primaryKey = 'route_id';
    protected $keyType = 'integer';
    public $incrementing = true;
    public $timestamps = false;

    public function stations()
    {
        $stations = $this->belongsToMany('App\Models\StationModel', 'routes_stations', 'route_id', 'station_id')->orderBy('order')->get(['*', 'order']);
        foreach ($stations as $station){
            $station = $station->routes();
        }
        return $stations;
    }
}
