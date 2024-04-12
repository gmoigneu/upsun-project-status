<?php
namespace App\Helpers;

use App\Models\Activity;
use Illuminate\Support\Facades\Cache;

class AvailabilityHelper
{
    const PENDING_ACTIVITIES = [
        'environment.operation',
        'environment.push',
        'environment.redeploy',
        'environment.source-operation',
        'environment.domain.create',
        'environment.domain.delete',
        'environment.domain.update',
        'environment.restore',
        'environment.synchronize',
        'environment.variable.create',
        'environment.variable.delete',
        'environment.variable.update',
    ];

    const NOK_ACTIVITIES = [
        'environment.deactivate',
        'environment.delete',
        'environment.pause',
    ];

    const OK_ACTIVITIES = [
        'environment.initialize',
        'environment.resume',
    ];

    public static function updateEnvironment(Activity $activity): void
    {
        // Activity has not yet started, skip it
        if ($activity->state === 'pending')
            return;

        // Activity will bring the environment down if not cancelled
        if (in_array($activity->type, self::NOK_ACTIVITIES)) {
            $activity->environment->is_available = ($activity->state === 'cancelled');
        }

        // Activity will bring the environment up when completed
        if (in_array($activity->type, self::OK_ACTIVITIES)) {
            $activity->environment->is_available = ($activity->state === 'complete');
        }

        // Activity will bring the environment down before it's completed
        if (in_array($activity->type, self::PENDING_ACTIVITIES)) {
            $activity->environment->is_available = ($activity->state === 'complete');
        }

        $activity->environment->save();
        self::updateCache($activity->environment);
        return;
    }

    public static function updateCache($environment): void
    {
        // Update cache
        Cache::put('env-' . $environment->id, $environment->is_available);
        return;
    }
}