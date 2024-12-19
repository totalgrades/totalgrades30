<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Admin;
use App\Section;
use App\Group;
use App\Course;


class Staffer extends Model
{
	public $fillable = ['group_id','staffer_number','registration_code','title',
        'first_name','last_name','gender','employment_status','nationality',
        'national_card_number','passport_number','phone','email','state','current_address',
        'date_of_employment','created_at','updated_at'
    
    ];

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    
    public function group()
    {

        return $this->belongsTo('App\Group');
    }


    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function staffer_registrations()
    {
        return $this->hasMany('App\StafferRegistration');
    }

        
}
