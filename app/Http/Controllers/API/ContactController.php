<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Repositories\User\ContactRepository;
 

class ContactController extends Controller
{
     
    /**
     * @var ContactRepository
     */
    protected $contactRepo;
        /**
     * @var Contact
     */
    protected $contact;
    
    /**
     * ContactController constructor.
     *
     * @param ContactRepository $contacts
     */
    public function __construct( Contact $contact,ContactRepository $contactRepo)
    {
        $this->contact = $contact;
        $this->contactRepo = $contactRepo;
    }


}
