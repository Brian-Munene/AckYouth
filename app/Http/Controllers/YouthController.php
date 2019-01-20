<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

use App\Notifications\Internship;
use App\Youth;

class YouthController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youths = Youth::orderBy('firstname', 'asc')->paginate(10);
        return view('Ack.members')->with('youths', $youths);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('Ack.details');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        $this->validate($request,[
            'national_id'=>'required',
            'church_reg_number'=>'required',
            'firstname'=>'required',
            'secondname'=>'required',
            'surname'=>'required',
            'date_of_birth'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'occupation'=>'required',
            'hbc'=>'required',
            'location'=>'required',
            'cv_file'=>'file|nullable|max:1999'
       ]);

       //Handle the file upload
       if($request->hasFile('cv_file'))
       {
            //Get file name with Extension
            $fileNameWithExt = $request->file('cv_file')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get the extension
            $extension = $request->file('cv_file')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload file
            $path = $request->file('cv_file')->storeAs('public/cv_files', $fileNameToStore);

       }else{
            $fileNameToStore = 'nofile';
       }
       //Create Member
       $youth = new Youth;
       $youth->user_id = auth()->user()->id;
       $youth->national_id = $request->input('national_id');
       $youth->church_reg_number = $request->input('church_reg_number');
       $youth->firstname = $request->input('firstname');
       $youth->secondname = $request->input('secondname');
       $youth->surname = $request->input('surname');
       $youth->date_of_birth = $request->input('date_of_birth');
       $youth->phone_number = $request->input('phone_number');
       $youth->email = $request->input('email');
       $youth->occupation = $request->input('occupation');
       $youth->organization_name = $request->input('organization_name');
       $youth->school = $request->input('school');
       $youth->course = $request->input('course');
       $youth->year = $request->input('year');
       $youth->hbc = $request->input('hbc');
       $youth->location = $request->input('location');
       $youth->cv_file = $fileNameToStore;
      
       $youth->save();

       return redirect('/members')->with('success', 'Registration Successful');       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $youth = Youth::find($id);
            return view('Ack.profile')->with('youth', $youth);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $youth = Youth::find($id);

        //Check for correct user
        if(auth()->user()->id !== $youth->user_id)
        {
            return redirect('/memebers')->with('error', 'Unauthorized Page');
        }
        return view('Ack.edit')->with('youth', $youth);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'national_id'=>'required',
            'church_reg_number'=>'required',
            'firstname'=>'required',
            'secondname'=>'required',
            'surname'=>'required',
            'date_of_birth'=>'required',
            'phone_number'=>'required',
            'email'=>'required',
            'occupation'=>'required',
            'organization_name'=>'required',
            'school'=>'required',
            'course'=>'required',
            'year'=>'required',
            'hbc'=>'required',
            'location'=>'required',
            'cv_file'=>'nullable|max:1999'
       ]);

       //Handle the file upload
       if($request->hasFile('cv_file'))
       {
        //Get file name with Extension
        $fileNameWithExt = $request->file('cv_file')->getClientOriginalName();
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get the extension
        $extension = $request->file('cv_file')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload file
        $path = $request->file('cv_file')->storeAs('public/cv_files', $fileNameToStore);

       }

       //Update Member details
       $youth = Youth::find($id);
       $youth->national_id = $request->input('national_id');
       $youth->church_reg_number = $request->input('church_reg_number');
       $youth->firstname = $request->input('firstname');
       $youth->secondname = $request->input('secondname');
       $youth->surname = $request->input('surname');
       $youth->date_of_birth = $request->input('date_of_birth');
       $youth->phone_number = $request->input('phone_number');
       $youth->email = $request->input('email');
       $youth->occupation = $request->input('occupation');
       $youth->organization_name = $request->input('organization_name');
       $youth->school = $request->input('school');
       $youth->course = $request->input('course');
       $youth->year = $request->input('year');
       $youth->hbc = $request->input('hbc');
       $youth->location = $request->input('location');
       if($request->hasFile('cv_file')){
           $youth->cv_file = $fileNameToStore;
       }

       $youth->save();

       return redirect('/members')->with('success', 'Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youth = Youth::find($id);
         //Check for correct user
         if(auth()->user()->id !== $youth->user_id)
        {
            return redirect('/memebers')->with('error', 'Unauthorized Page');
        }

        if($youth->cv_file != 'nofile')
        {
            //Delete Image
            Storage::delete('public/cv_file/'.$youth->cv_file);
        }
        $youth->delete();
        return redirect('/members')->with('success', 'Details Removed');
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InternshipForm()
    {  
        return view('Ack.internshipForm');
    }


    /** 
     * Internship  notification is handled here.
     * 
     */
    public function InternshipSearch(Request $request)
    {
        $this->validate($request,[
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
         
        $user = auth()->user();
        $youth = Youth::where('id', $user->id)->first();
            dd($youth);
        $notificaton = sprintf(
            'Internship application by %s %s from %s to %s in %s',
            $youth->firstname,
            $youth->secondname,
            $$request->input('start_date'),
            $request->input('end_date'),
            $youth->course
        );

        $user->notify(new Internship($notification));
        return back()->with('success', 'Internship application sent');



        //$start_date = $request->input('start_date');
        //$end_date = $request->input('end_date');
         //$id = auth()->user()->id;
        //$firstname = Youth::where('id', $id)->get(['firstname']); 
        //$secondname = Youth::where('id', $id)->get(['secondname']);   
        //$course = Youth::where('id', $id)->get(['course']);
         //$notification = 'Internship application by ' . $firstname . $secondname . ' from ' . $start_date . ' to ' . $end_date . ' in ' . $course;    
        //auth()->user()->notify(new Internship($notification));

        //return back()->with('success','Internship application sent');
        //return notification;
        
        
    }

    public function adminLogin (Request $request) 
    {

        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) 
        {
            // Authentication passed...
            $user = auth()->user();
            $user->save();
            return $user;
        }
        $msg = 'Welcome back';    
        return view('/members')->with('success', $msg);
    }

}
