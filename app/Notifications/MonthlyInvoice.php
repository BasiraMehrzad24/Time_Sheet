<?php

namespace App\Notifications;

use App\Models\CompanyUser;
use App\Models\User;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MonthlyInvoice extends Notification
{

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(protected User $user)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        // projects the user has worked on in the last month
        $reports = $this->user->reports()
            ->whereMonth('date', now()->subMonth()->month)
            ->whereYear('date', now()->subMonth()->year)
            ->get();
           
        $message="";
        $total = 0;
        foreach($reports as $key=>$report){
            $project = Project::find($key);
            $companyUser = CompanyUser::where('company_id', $project->company_id)->where('user_id', $this->user->id)->first();
            $rate = $companyUser->salary;
            $message .="this is your total hour"
             .$report->sum('hours');
            $total += $report->sum('hours')*$rate;
        }
        $message .="this is your total of salary".$total."";

        // 20 report, hours, the project x
        return (new MailMessage)
            ->greeting('Dear'.$this->user->name.',')
            ->line($message)
            ->action('Overview', route('profile.index', $this->user->id))
            ->line('Thank you for using our application!',);
   
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
