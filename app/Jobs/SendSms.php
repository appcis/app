<?php

namespace App\Jobs;

use App\Models\Agent;
use App\Models\Sms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var Sms */
    protected $sms;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->sms->update(['etat_envoi' => 'EN_COURS']);
        $this->sms->agents->each(function (Agent $agent) {
            //Http::get('http://88.162.54.93/RaspiSMS/smsAPI?email=admin@example.fr&password=admin&numbers=0659300020&text=test');
            Http::get('http://'. env('SMS_IP') .'/RaspiSMS/smsAPI?email=admin@example.fr&password=' . env('SMS_PASSWORD'). '&numbers='. $agent->phone . '&text='. urlencode($this->sms->message));
            sleep(5);
        });
        $this->sms->update(['etat_envoi' => 'ENVOYE']);
    }
}
