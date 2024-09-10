<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'patterns',
        'responses',
    ];

    protected $cast = [
        'patterns' => 'json',
        'responses' => 'json'
    ];
}
