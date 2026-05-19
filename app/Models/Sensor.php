<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = ['suhu', 'kelembaban'];

    public function getStatus()
    {
        if ($this->suhu < 26) {
            return "Terlalu Dingin ❄️";
        } elseif ($this->suhu > 29) {
            return "Terlalu Panas 🔥";
        } else {
            return "Ideal ✅";
        }
    }

    public function statusLingkungan()
    {
        if (
            $this->suhu >= 26 && $this->suhu <= 29 &&
            $this->kelembaban >= 80 && $this->kelembaban <= 90
        ) {
            return "Ideal untuk Walet 🐦";
        } else {
            return "Tidak Ideal ⚠️";
        }
    }
}