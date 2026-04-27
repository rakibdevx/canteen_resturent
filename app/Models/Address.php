<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'label',
        'building_name',
        'floor',
        'room_no',
        'department',
        'campus',
        'notes',
        'is_default',
    ];


    public function getFullAddressAttribute()
    {
        $parts = array_filter([
            $this->building_name,
            $this->floor,
            $this->room_no,
            $this->department,
            $this->campus,
            $this->notes,
        ]);

        return implode(', ', $parts);
    }
}
