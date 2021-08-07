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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function send(Request $request)
    {
        if ($request->method() === 'POST') {
            /** @var Sms $sms */
            $sms = new Sms([
                'message' => $request->message
            ]);
            $sms->user()->associate(\Auth::user());
            $sms->etat_envoi = 'ATTENTE';
            $sms->save();

            $sms->agents()->attach($request->agents);

            /** On envoi les SMS que si on est pas en mode debug */
            if (!config('app.debug')) {
                SendSms::dispatch($sms);
            }

            return redirect()->route('sms.show', $sms);
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

    public function show(Sms $sms)
    {
        return view('pages.sms.show', compact('sms'));
    }

    public function historique()
    {
        $messages = \Auth::user()->sms()->orderByDesc('created_at')->get();

        return view('pages.sms.historique', compact('messages'));
    }
}
