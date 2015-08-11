<?php
/**
 * Created by PhpStorm.
 * User: garthmajiet
 * Date: 11/08/15
 * Time: 00:05
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades;
use Laravel\Socialite\Facades\Socialite as Socialize;

class AccountController extends Controller
{

    // To redirect github
    public function github_redirect() {
        return Socialize::with('github')->redirect();
    }

    // to get authenticate user data
    public function github() {
        $user = Socialize::with('github')->user();

        $repo_list = $this->getRepos($user);

        echo '<pre>';print_r($repo_list);

        //return view('repos')->with($repos);
    }

    protected function getRepos(&$user)
    {
        $client = new Client();

        $res = $client->get($user->user['repos_url'], [], [
            'headers' => [
                'Authorization' => "token {$user->token}"
            ]
        ]);

        $list = json_decode($res->getBody(), true);

        return $list;
    }

}