<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactUsRequest;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request)
    {
        $data = $request->validated();
        ContactUs::create($data);
        return redirect()->to('/');
    }

}
