<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App\Models
 * @property int id
 * @property string user_name
 * @property string email
 * @property string content
 * @property string status
 */
class Task extends Model
{
    const STATUS_NEW = 'new';
    const STATUS_DONE = 'done';

    protected $fillable = ['user_name', 'email', 'content'];
}
