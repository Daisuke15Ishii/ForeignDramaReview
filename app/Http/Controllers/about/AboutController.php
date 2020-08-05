<?php

namespace App\Http\Controllers\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contact;

class AboutController extends Controller
{
    public function index(Request $request){
        //aboutトップを表示するアクション
        return view('about.index');
    }
    
    public function info(Request $request){
        //aboutトップを表示するアクション
        return view('about.info.index');
    }
    
    public function terms_of_service(Request $request){
        //aboutトップを表示するアクション
        return view('about.terms-of-service.index');
    }
    
    public function contactcreate(Request $request){
        //aboutトップを表示するアクション
        return view('about.contact.create');
    }
    
    public function contactupdate(Request $request){
        //問合せ内容を保存するアクション
        
        $this->validate($request, Contact::$rules);
        $contact = new Contact;
        $form = $request->all();
        
        unset($form['_token']);
        $contact->fill($form);
        $contact->save();
        
        return view('about.contact.thanks');
    }

    public function contactsend(Request $request){
        //問合せ内容を保存するアクション
        
        $this->validate($request, Contact::$rules);
        $contact = new Contact;
        $form = $request->all();
        
        unset($form['_token']);
        $contact->fill($form);
        $contact->save();
        
        return view('about.contact.thanks');
    }
    
}
