<?php

namespace App\Http\Controllers;

use App\Mail\CreatedEmail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use Storage;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // if(!auth()->user()->cannot('viewAny',Issue::class))
        $this->authorize('viewAny', Issue::class);
        $filters= $request->only(['title','priority','statuses','reporters','departments']);
        //$user_department= Auth::user()->name;
        return inertia('Index/Index',[
            'filters' => $filters,
            'issues' => Issue::with('reporter')->filter($filters)->
            paginate(5)->withQueryString(),
            'departments' => ['Web', 'Android','iOS'],
            'priority' => ['Very Low', 'Low','Moderate','High','Critical'],
            'statuses' =>['Pending', 'In Progress','Complete','Rejected'],
            'reporters' => User::all()
            //supply filters, they're automatically passed to local scope filter in Model
        ]);
    }


    //dev index

    public function dev_index(Request $request)
    {
        $this->authorize('viewAnyDev', Issue::class);

        // if(!auth()->user()->cannot('viewAny',Issue::class))
          //$this->authorize('viewAnyDev', Issue::class);
        $filters= $request->only(['title','priority','statuses','reporters','departments']);
        $user_department= Auth::user()->department;

        //dd(User::where('role', '=', 'QA')->get());

       //$users= \Cache::remember('users',now()->addDays(30), function (){
            //ret user
        //});


        return inertia('Index/Index',[
            'filters' => $filters,
            'issues' => Issue::with('reporter')->latest()->where('department',$user_department)->filter($filters)->
            paginate(5)-> withQueryString(),
            'priority' => ['Very Low', 'Low','Moderate','High','Critical'],
            'statuses' =>['Pending', 'In Progress','Complete','Rejected'],
            'reporters' => User::where('role', '=', 'QA')->get()
            //supply filters, they're automatically passed to local scope filter in Model
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Issue::class);

        return inertia('Issue/CreateIssue',[
            'departments' => ['Web', 'Android','iOS'],
            'priorities' => ['Very Low', 'Low','Moderate','High','Critical']
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Issue::class);

        $validatedData = $request->validate([
            'title' => 'required|min:5|max:120',
            'department' => 'required',
            'priority' => 'required',
            'description' => 'required',
            'status' => 'sting',
            'attachments' => ''
        ]);

        $issue = $request->user()->issues()->create($validatedData);

        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments');
            $path = $file->store('attachments');
            $issue->attachments = $path;
            $issue->save();
        }

            //sendmail
      //  $user_name = $request->user()->name;

      //  \Mail::to('testreceiver@gmail.com’')->send(new CreatedEmail($user_name));


        return redirect("issue/{$issue->id}")->with('success','Post Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Issue $issue)
    {
       // dd($issue);
        $issue->load(['reporter']);
        return inertia('Index/Show', [
            'issue' => $issue

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Issue $issue)
    {
        $this->authorize('update', Issue::class);

        return inertia('Issue/EditIssue',[
            'issue' => $issue,
            'departments' => ['Web', 'Android','iOS'],
            'priorities' => ['Very Low', 'Low','Moderate','High','Critical']
        ]);

    }

    public function edit_dev(Issue $issue)
    {
        $this->authorize('updateDev', Issue::class);

        return inertia('Issue/EditIssueDev',[
            'issue' => $issue,
            'statuses' =>['Pending', 'In Progress','Complete','Rejected']

        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Issue $issue)
    {
        $this->authorize('update', Issue::class);

        $issue->update($request->validate([
            'title' => 'required|min:5|max:120',
            'department' => 'required',
            'priority' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('index')->with('success','Edit Success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_dev(Request $request, Issue $issue)
    {
        $this->authorize('updateDev', Issue::class);

        $issue->update($request->validate([
            'status' => 'required',
        ]));
        return redirect()->route('index')->with('success','Status Update Success');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Issue $issue)
    {
        $this->authorize('delete', Issue::class);

        $issue->delete();
        return back()
            ->with('success', 'Deleted!');
    }

    /**
     * Remove the specified resource attached file from storage.
     */
    public function destroy_file(Issue $issue)
    {
        $this->authorize('delete', Issue::class);

        Storage::disk('public')->delete($issue->attachments);
        session()->put('success', 'File Deleted!');
    }
}
