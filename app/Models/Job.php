<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuider;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['title','location','description','salary','experience','category'];

    public static array $experience = ['intern','fresher','junior','senior'];
    public static array $category = ['IT','Marketing','Sale','Content','Data analyst'];


    public function employers(): BelongsTo
    {
        return $this->belongsTo(Employers::class);
    }
    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    //User Apply
    public function hasUserApplied(Authenticatable|User|int $user): bool
    {
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }
    public function scopeFilter(Builder | QueryBuider $query, array $filters): Builder|QueryBuider
    {
        //neu gia tri ben trai nulll thi su dung gia tri ben phai '??'
        //orWhereHas -> khi co moi quan he
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function($query) use($search){
                $query->where('title','like','%'. $search .'%')
                    ->orWhere('description','like','%'.  $search)
                    ->orWhereHas('employers', function($query) use($search){
                        $query->where('company_name','like','%'.$search.'%');
                    });
                  
            });
        })->when($filters['min_salary'] ?? null, function ($query, $min_salary) {
            $query->where('salary','>=', $min_salary);
        })->when($filters['max_salary'] ?? null , function ($query, $max_salary) {
            $query->when('salary', '<=', $max_salary);
        })->when($filters['experience'] ?? null, function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
