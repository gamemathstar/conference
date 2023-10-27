<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    //
//

    public function __construct()
    {
        $this->middleware("auth:admin");
    }


    /**
     * Display the admin dashboard with submissions.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // Retrieve all submissions
        $conf = Conference::conference();
        $submissions = ConferenceSubmission::all();
        // Pass submissions data to the view
        return view('pages.admin.dashboard', compact('submissions'));
    }

    public function submitReview(Request $request, ConferenceSubmission $submission)
    {
        // Validate the request
        $request->validate([
            'remarks' => 'required',
            'status' => 'required|in:approved,rejected',
        ]);

        // Update the submission with the remarks and status
        $submission->update([
            'remark' => $request->input('remarks'),
            'status' => $request->input('status'),
        ]);

        // Redirect back or to another page
        return redirect()->back()->with('success', 'Review submitted successfully');
    }

    public function conferences()
    {
        return view('admin.conferences');
    }

    public function speakers()
    {
        return view('admin.speakers');
    }

    public function partners()
    {
        return view('admin.partners');
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
