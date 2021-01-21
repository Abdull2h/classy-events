@component('mail::message')
Dear {{ $recipint->name }}

# Event Detailes

@component('mail::table')
| Event | Detailes |
| ------ | ------ |
| Name |  {{ $event->name }} |
| Date |  {{ $event->date }} |
| Time |  {{ $event->time }} |
| Location |  {{ $event->location }} |
| Description |  {{ $event->description }} |
| Image |  http://classy-events.test/public/images/{{ $event->image }} |
| Owner Name |  {{ App\Models\User::where('id', $event->owner)->first()->name }} |
| Owner Email |  {{ App\Models\User::where('id', $event->owner)->first()->email }} |
@endcomponent


# Invitation Detailes
+ ## Invitation Code: {{ $recipint->code }}
+ ## Seats: {{ $recipint->seats }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
