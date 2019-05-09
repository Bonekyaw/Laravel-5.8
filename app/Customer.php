<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','email','active','company_id'];

    // To create default attribute which error becomes when new customer object is called
    // If active of new object is null, this attribe is set as default active value
    // attribute + s
    protected $attributes = [
        'active' => 1
    ];

    //Get active column from customers table & change value to view
    public function getActiveAttribute($attribute)
    {
        return $this->activeOption()[$attribute];
    }

    public function activeOption(){
        return [
            0 => 'Inactive',
            1 => 'Active'
        ];
    }

    //To use active() from CustomerController
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active',0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
