<?php

namespace App\Http\Controllers;

use App\Jobs\SendSms;
use App\Models\Agent;
use App\Models\Groupe;
use App\Models\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->method() === 'POST') {
            /** @var Sms $sms */
            $sms = Sms::create([
                'message' => $request->message
            ]);
            $sms->agents()->attach($request->agents);

            SendSms::dispatch($sms);
        }

        return view('pages.sms.index', [
            'agents' => Agent::all()->sortBy('nom'),
            'groupes' => Groupe::orderBy('name')->with('agents:id')->get()->transform(function (Groupe $el) {
                return [
                    'name' => $el->name,
                    'description' => $el->description,
                    'agents' => $el->agents->pluck('id')
                ];
            })
        ]);
    }
}
