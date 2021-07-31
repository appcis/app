<?php

namespace App\Http\Controllers;

use App\Jobs\SendSms;
use App\Models\Agent;
use App\Models\Groupe;
use App\Models\Sms;
use App\Models\User;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if ($request->method() === 'POST') {
            /** @var Sms $sms */
            $sms = Sms::create([
                'message' => $request->message
            ]);
            $sms->agents()->attach($request->agents);
            $sms->update(['etat_envoi' => 'ATTENTE']);

            SendSms::dispatch($sms);

            return redirect()->route('sms.historique');
        }

        return view('pages.sms.send', [
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

    public function historique()
    {
        $messages = \Auth::user()->sms()->orderByDesc('created_at')->get();

        return view('pages.sms.historique', compact('messages'));
    }
}
