<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\ConferenceReviewer;
use App\Models\ConferenceSubmission;
use App\Models\JournalSubmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    //
//

    public function __construct()
    {
        $this->middleware("auth:admin");
    }


    public function index()
    {
        $users = User::all();

        return view('pages.admin.user.index', compact('users'));
    }

    // Show edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.edit', compact('user'));
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('users.index')->with('success', 'User details updated successfully.');
    }

    // Show reset password form
    public function showResetPasswordForm($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.reset_password', compact('user'));
    }

    // Reset user password
    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('users.index')->with('success', 'User password reset successfully.');
    }

    // Show make journal admin confirmation form
    public function showMakeJournalAdminForm($id)
    {
        $user = User::findOrFail($id);
        return view('pages.admin.users.make_journal_admin', compact('user'));
    }

    // Make user a journal admin
    public function makeJournalAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_journal_admin= 1;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User is now a journal admin.');
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
        $submissions = ConferenceSubmission::join("participation","participation.id","=","participation_id")
            ->join("participants","participants.id","=","participation.participant_id")->get();
        // Pass submissions data to the view
        return view('pages.admin.dashboard', compact('submissions'));
    }

    public function submitReview(Request $request, ConferenceSubmission $submission)
    {
        // Validate the request
        $request->validate([
            'remarks' => 'required',
            'status' => 'required',
        ]);

        // Update the submission with the remarks and status
        $submission->update([
            'remark' => $request->input('remarks'),
            'status' => $request->input('status'),
        ]);

        // Redirect back or to another page
        return redirect()->back()->with('success', 'Review submitted successfully');
    }

    public function submitReviewJournal(Request $request, JournalSubmission $submission)
    {
        // Validate the request
        $request->validate([
            'remarks' => 'required',
            'status' => 'required',
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

    public function download(Request $request,$id,$type=null)
    {
        $submission = ConferenceSubmission::findOrFail($id);
        // Check if file exists in app/storage/file folder
        $file_path = storage_path('app').($type?$submission->payment_url:$submission->url);
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

    public function submissionsWithoutReviewer(Request $request)
    {
        $conf = $request->cnf?$request->cnf:"Conference";
        $submissions = ConferenceSubmission::has('reviewers', '<', 1)->where('type',$conf)->get();
        $users = User::all();


        return view('pages.admin.submissions.index', compact('submissions', 'users'));
    }

    public function addReviewer(Request $request)
    {
        // Validate the request
        $request->validate([
            'submission_id' => 'required|exists:conference_submissions,id',
            'reviewer_id' => 'required|exists:users,id',
        ]);

        // Add the reviewer for the submission
        ConferenceReviewer::create([
            'user_id' => $request->input('reviewer_id'),
            'conference_submission_id' => $request->input('submission_id'),
        ]);

        return redirect()->route('submissions.without.review')->with('success', 'Reviewer added successfully.');
    }

    public function myReviewSubmissions(Request $request)
    {
        // Get the currently logged-in user's ID
        $userId = Auth::id();
        $type = $request->cnf?$request->cnf:"Conference";

        // Fetch submissions where the user is a reviewer
        $submissions = ConferenceSubmission::whereHas('reviewers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->join("participation","participation.id","=","participation_id")
        ->join("participants","participants.id","=","participation.participant_id")->get();

        return view('pages.admin.submissions.my_reviews', compact('submissions','type'));
    }

    public function submissionsWithoutReviewerJournal()
    {
        $submissions = JournalSubmission::has('reviewers', '<', 1)->get();
        $users = User::all();


        return view('pages.admin.submissions.index_jour', compact('submissions', 'users'));
    }

    public function addReviewerJournal(Request $request)
    {
        // Validate the request
        $request->validate([
            'submission_id' => 'required|exists:conference_submissions,id',
            'reviewer_id' => 'required|exists:users,id',
        ]);

        // Add the reviewer for the submission
        ConferenceReviewer::create([
            'user_id' => $request->input('reviewer_id'),
            'conference_submission_id' => $request->input('submission_id'),
        ]);

        return redirect()->route('submissions.without.review')->with('success', 'Reviewer added successfully.');
    }

    public function myReviewSubmissionsJournal(Request $request)
    {
        // Get the currently logged-in user's ID
        $userId = Auth::id();

        // Fetch submissions where the user is a reviewer
        $submissions = JournalSubmission::whereHas('reviewers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->join("participants","participants.id","=","journal_submissions.participant_id")
            ->where('type',$type)
            ->get();

        return view('pages.admin.submissions.my_reviews_jour', compact('submissions'));
    }

}
