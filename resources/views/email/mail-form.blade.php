@component('mail::message')
# Introduction

<strong>Name</strong> {{$data['name']}}
<strong>Email</strong> {{$data['email']}}
<br>
{{$data['message']}}

@component('mail::button', ['url' => 'www.zunite.org'])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
