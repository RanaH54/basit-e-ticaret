<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AjaxController extends Controller
{
    public function iletisimkaydet(Request $request){
        $data = $request->all();
        $data['ip'] = request()->ip();
        $sonkaydedilen = Contact::create($data);
        $request->validate([
            'name' => 'required',
            'message' => 'required',
        ]);
        return back()->with(['message'=>'Mesajınız başarıyla gönderildi!']);
    }
}
