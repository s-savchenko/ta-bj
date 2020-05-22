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
 */
class Task extends Model
{
    protected $fillable = ['user_name', 'email', 'content'];
}
