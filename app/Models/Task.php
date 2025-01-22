<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс отвечающий за модель таблицы tasks
 */
class Task extends Model
{
    use HasFactory;

    /**
     * Защищенные атрибуты модели
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'create_date',
        'priority',
        'category',
        'status'
    ];

    /**
     * Отключение временных меток created_at, updated_at.
     *
     * @var bool = false
     */
    public $timestamps = false;
}
