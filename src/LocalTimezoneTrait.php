<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait LocalTimezoneTrait
{
    // Default Timezone
    private string $myTimezone = 'Asia/Dhaka';

    /**
     * Auto runs for Insert/Update operations to adjust user timezone
     */
    protected static function bootLocalTime(): void
    {
        // Before Insert operations
        static::creating(function ($model): void {
            $model->adjustToUserTimezone();
        });

        // Before Update operations
        static::updating(function ($model): void {
            $model->adjustToUserTimezone();
        });
    }

    /**
     * Adjust time for logged users
     */
    protected function getUserTimezone(): string
    {
        // Checks timezone for logged users
        $user = Auth::user();
        
        if ($user && ! empty($user->timezone)) {
            return $user->timezone;
        }

        // Default timezone for guests
        return $this->myTimezone;
    }

    /**
     * Converts Laravel timestamps (created_at, updated_at) to user timezone
     */
    public function adjustToUserTimezone(): void
    {
        $timezone = $this->getUserTimezone();

        // Convert created_at to user time
        if ($this->created_at) {
            $this->created_at = Carbon::parse($this->created_at)->setTimezone($timezone);
        }

        // Convert updated_at to user time
        if ($this->updated_at) {
            $this->updated_at = Carbon::parse($this->updated_at)->setTimezone($timezone);
        }
    }
}
