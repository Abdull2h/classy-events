@component('mail::message')

Dear Admin,

This is a message from Contact us form in Classy-Events.
@component('mail::table')
|Field|Detail|
|-------|--------|
|Sender Name|{{ $data['name'] }}|
|Sender Email|{{ $data['email'] }}|
|Subject|{{ $data['subject'] }}|
|Message|{{ $data['message'] }}|
@endcomponent



Thanks,<br>
{{ config('app.name') }}
@endcomponent
