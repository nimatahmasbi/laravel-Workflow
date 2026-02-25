<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'department_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the user's role
     */
    public function getRoleAttribute($value)
    {
        return $value ?? 'user';
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is manager
     */
    public function isManager(): bool
    {
        return in_array($this->role, ['admin', 'manager']);
    }

    /**
     * Check if user is supervisor
     */
    public function isSupervisor(): bool
    {
        return in_array($this->role, ['admin', 'manager', 'supervisor']);
    }

    /**
     * Check if user can manage departments
     */
    public function canManageDepartments(): bool
    {
        return $this->isManager();
    }

    /**
     * Check if user can manage workflows
     */
    public function canManageWorkflows(): bool
    {
        return $this->isSupervisor();
    }

    /**
     * Check if user can manage tasks
     */
    public function canManageTasks(): bool
    {
        return $this->isSupervisor();
    }

    /**
     * Check if user can view all data
     */
    public function canViewAll(): bool
    {
        return $this->isSupervisor();
    }

    /**
     * Get user's department
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get tasks assigned to user
     */
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assignee_id');
    }

    /**
     * Get workflows created by user
     */
    public function createdWorkflows()
    {
        return $this->hasMany(Workflow::class, 'created_by');
    }
}
