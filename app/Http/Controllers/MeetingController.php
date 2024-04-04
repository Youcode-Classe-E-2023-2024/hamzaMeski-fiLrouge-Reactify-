<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMeeting;

class MeetingController extends Controller
{
    public function meetingUser() {
        return view('meeting.createMeeting');
    }

    public function createMeeting() {
        $meeting = auth()->User()->getUserMeetingInfo()->first();
        if(!isset($meeting->id)) {
            $name = 'agora'.rand(1111, 9999);
            $meetingData = createAgoraProject($name);
            if(isset($meetingData->project->id)) {
                $meeting          = new UserMeeting();
                $meeting->user_id = auth()->user()->id;
                $meeting->app_id = $meetingData->project->vendor_key;
                $meeting->appCertificate = $meetingData->project->sign_key;
                $meeting->channel = $meetingData->project->name;
                $meeting->save();

            }else {
                echo 'Project not created';
            }
        }

        $meeting = auth()->User()->getUserMeetingInfo()->first();
        $token = createToken($meeting->app_id, $meeting->appCertificate, $meeting->channel);
        $meeting->token = $token;
        $meeting->url = generateRandomString();
        $meeting->save();

        if(auth()->user()->id = $meeting->user_id) {
            Session::put('meeting', $meeting->url);
        }
        return redirect('joinMeeting/'.$meeting->url);
    }

    public function joinMeeting($url='') {
        $meeting = UserMeeting::where('url', $url)->first();

        if(isset($meeting->id)) {
            // meeting exist
            $meeting->app_id = trim($meeting->app_id);
            $meeting->appCertificate = trim($meeting->appCertificate);
            $meeting->channel = trim($meeting->channel);
            $meeting->token = trim($meeting->token);

            if(auth()->user()->id == $meeting->user_id) {
                // meeting create

            }else {
                if(!auth()->user()) {
                    $random_user = rand(111111, 999999);
                    $this->createEntry($meeting->user_id, $random_user, $meeting->url);
                }else {
                    $this->createEntry($meeting->user_id, auth()->user()->id, $meeting->url);
                }
            }
            return view('joinUser', get_defined_vars());
        }else {
            // meeting deos not exist

        }
    }

    public function createEntry($user_id, $random_user, $url) {
        $entry = new MeetingEntry();
        $entry->user_id = $user_id;
        $entry->random_user = $random_user;
        $entry->url = $url;
        $entry->status = 0;
        $entry->save();
    }
}
