<?php



namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function hr()
    {
        return $this->hasMany(HR::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}

