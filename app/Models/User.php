<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        // Handle search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

         // Handle other filters
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $value = $request->input($column);

                // Handle special case for email_verified_at
                if ($column === 'email_verified_at') {
                    if ($value === 'verified') {
                        $query->whereNotNull('email_verified_at');
                    } elseif ($value === 'unverified') {
                        $query->whereNull('email_verified_at');
                    }
                } else {
                    $query->where($column, $value);
                }
            }
        }

        return $query;
    }
}
