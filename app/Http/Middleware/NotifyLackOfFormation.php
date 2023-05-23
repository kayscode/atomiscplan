<?php

namespace App\Http\Middleware;

use App\Models\Formation;
use App\Models\Notification;
use App\Repository\FormationRepository;
use App\Repository\UserRepository;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotifyLackOfFormation
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next, FormationRepository $formationRepository, Notification $notification, UserRepository $userRepository): Response
    {
        $after_minutes = 2;
        $last_notification_sent = $notification->all()->sortBy('created_at', descending: true)[0];

        if(!empty($last_notification_sent))
        {
            $last_notification_sent_date = Carbon::fromSerialized($last_notification_sent->created_at);
            $last_notification_sent_date->addHours(2);

            // with one month
            // $last_notification_sent_date_with_one_more_month = $last_notification_sent_date->addMonth();

            // with 3 minutes
            $last_notification_sent_date_with_one_more_month = $last_notification_sent_date->addMinutes(3);
            $current_date_time = Carbon::now(new \DateTimeZone('CAT'));

            if($last_notification_sent_date_with_one_more_month->greaterThan($current_date_time)){
                return $next($request);
            }
        }

        $users = $userRepository->findAdminUsers();
        $formation = $formationRepository->findLastedFormation();
        $formation_end_date = Carbon::fromSerialized($formation->end_date);

        // add more 2 to the current end date formation
        $formation_end_date->addMinutes($after_minutes);
        $current_date = Carbon::now(new \DateTimeZone('CAT'));

        if($formation_end_date->greaterThan($current_date))
        {
            foreach ($users as $user)
            {
                Notification::create([
                    "message"=>"ca fait ".$after_minutes." minutes que vouz n'avez pas organizer de formation",
                    "user_id"=>$user->id
                ]);
            }
        }

        return $next($request);
    }
}
