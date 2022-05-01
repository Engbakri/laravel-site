<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactForm;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Contact::insert([
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('contacts')->with('Success','Contact Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);

        return view('admin.contact.edit',compact('contact'));
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
        Contact::find($id)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('contacts')->with('Success','Contact Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('contacts')->with('Success','Contact Deleted Successfully');
    }

    public function ViewContact()
    {
        $contacts = Contact::all();

        return view('web.contact',compact('contacts'));
    }

    public function contactform(Request $request)
    {

        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|email',
            'subject' => 'required|min:1',
            'message' => 'required|min:1',
        ]);

        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('contacts')->with('Success','Contact Deleted Successfully');
    }

    public function MessageContact()
    {
        $contacts = ContactForm::all();

        return view('admin.contact.contactmessage',compact('contacts'));

    }

    public function deletemessage($id)
    {
        ContactForm::find($id)->delete();
        return redirect()->route('contactmessage')->with('success','Message Delete Successfully');
       
    }


    public function Sindex(){
      return view('intro');
     }

    public function search(Request $request)
    {
        
            $search =  $request->input('search');
           return view('result',compact('search'));
          
    }

    

}
