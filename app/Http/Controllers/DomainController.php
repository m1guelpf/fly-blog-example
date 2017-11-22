<?php

namespace App\Http\Controllers;

use App\User;
use Facades\M1guelpf\FlyAPI\Fly;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Render the index page for custom domains.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($domain)
    {
        $user = User::where('domain', $domain)->findOrFail();

        return view('posts', ['posts' => $user->posts]);
    }

    /**
     * Persist a custom domain to database.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Auth::user()->update($request->validate([
            'domain' => 'required|string|unique:users',
        ]));

        $domain = Fly::connect(config('services.fly.token'))->createHostname(config('services.fly.site'), $request->input('domain'));

        return redirect()->back()->withStatus("Success! To finish the setup, you need to point your domain to <b>{$domain['preview_hostname']}</b>. After that, everything's good to go.");
    }
}
