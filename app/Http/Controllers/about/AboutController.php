<?php

namespace App\Http\Controllers\about;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Contact;
use App\Mail\Contact2;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    public function index(Request $request){
        //aboutトップを表示するアクション
        return view('about.index');
    }
    
    public function info(Request $request){
        //お知らせページを表示するアクション
        return view('about.info.index');
    }

    public function manual(Request $request){
        //マニュアルページを表示するアクション
        return view('about.manual.index');
    }

    public function terms_of_service(Request $request){
        //利用規約等を表示するアクション
        return view('about.terms-of-service.index');
    }
    
    public function contactcreate(Request $request){
        //aboutトップを表示するアクション
        return view('about.contact.create');
    }
    
    public function contactupdate(Request $request){
        //問合せ内容を保存するアクション
        //今後、問合せ内容は管理者にメール送信する予定なので将来的には当アクションは利用せず。但し、メール送信機能の実装は後回し(保留)
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
        //問合せ内容を管理者にメール送信するアクション(エラー中のため実装保留)

        $to = [
            ['email' => $request->mail, 'name' => $request->name]
        ];        


        $data = $request->all();
        Mail::to($to)->send(new Contact2($data));

        return redirect()->route('contact_result');
    }

    public function contactresult(Request $request){
        //問合せ完了ページを表示するアクション(メール送信後に利用するアクション)
        return view('about.contact.thanks');
    }    
}
