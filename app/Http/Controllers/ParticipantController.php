<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceSubmission;
use App\Models\JournalSubmission;
use App\Models\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ParticipantController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware("auth");
    }


    public function dashboard()
    {
        // Retrieve data or perform actions needed for the dashboard

        // For example, retrieve conferences for the participant
//        $conferences = auth()->user()->conferences; // Adjust the relationship according to your setup

        $user = Auth::user();
        // You can pass data to the view
        return view('pages.participant.dashboard',compact('user'));
    }

    public function journal()
    {
        // Retrieve data or perform actions needed for the dashboard

        // For example, retrieve conferences for the participant
//        $conferences = auth()->user()->conferences; // Adjust the relationship according to your setup

        $user = Auth::user();
        // You can pass data to the view
        return view('pages.participant.journal',compact('user'));
    }

    public function joinConference(Request $request,$id)
    {
        $user = Auth::user();
        $conf = Conference::find($id);
        if($conf){
            $part = new Participation();
            $part->participant_id = $user->id;
            $part->conference_id = $id;
            $part->save();
        }

        return back();
    }

    public function upload(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'conference' => 'required|file|mimes:docx,doc,pdf|max:2048',
            'payment_img' => 'required|file|mimes:jpg,jpeg,docx,doc,pdf|max:2048'
        ]);
        $conf = Conference::conference();
        $part = $user->hasApplied($conf->id);
        $fileModel = new ConferenceSubmission();
        if($request->file()) {
            $fileName = time().'_'.$request->conference->getClientOriginalName();
            $fileNamePay = time().'_'.$request->payment_img->getClientOriginalName();
            $filePath = $request->file('conference')->storeAs('uploads', $fileName, 'public');
            $filePathPay = $request->file('payment_img')->storeAs('uploads', $fileNamePay, 'public');


            $fileModel->participation_id = $part->id;
            $fileModel->title = $request->title;
            $fileModel->type = $request->type;
            $fileModel->status = "Submitted";
            $fileModel->url = '/public/' . $filePath;
            $fileModel->payment_url = '/public/' . $filePathPay;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }

        return back();
    }

    public function uploadJournal(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'conference' => 'required|file|mimes:docx,doc,pdf|max:2048',
            'payment_img' => 'required|file|mimes:jpg,jpeg,docx,doc,pdf|max:2048'
        ]);
        $fileModel = new JournalSubmission();
        if($request->file()) {
            $fileName = time().'_'.$request->conference->getClientOriginalName();
            $fileNamePay = time().'_'.$request->payment_img->getClientOriginalName();
            $filePath = $request->file('conference')->storeAs('uploads', $fileName, 'public');
            $filePathPay = $request->file('payment_img')->storeAs('uploads', $fileNamePay, 'public');


            $fileModel->participant_id = $user->id;
            $fileModel->title = $request->title;
            $fileModel->status = "Submitted";
            $fileModel->url = '/public/' . $filePath;
            $fileModel->payment_url = '/public/' . $filePathPay;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }

        return back();
    }

    public function download(Request $request,$id)
    {
        $submission = ConferenceSubmission::findOrFail($id);
        // Check if file exists in app/storage/file folder
        $file_path = storage_path('app').$submission->url;
        [$path,$filename] = explode("uploads/",$file_path);
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
}
