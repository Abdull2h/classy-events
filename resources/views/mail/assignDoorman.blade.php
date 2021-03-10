@component('mail::message')
Dear {{ $recipint->name }}

# You are assigned to new event

## Event Detailes

@component('mail::table')
| Event | Detailes |
| ------ | ------ |
| Name |  {{ $event->name }} |
| Date |  {{ $event->date }} |
| Time |  {{ $event->time }} |
| Location |  {{ $event->location }} |
| Description |  {{ $event->description }} |
| Image Link |  {{ url('storage/public/images/' . $event->image) }} |
| Image  | ![event image]({{ url('storage/public/images/' . $event->image) }}) |
| Owner Name |  {{ App\Models\User::where('id', $event->owner)->first()->name }} |
| Owner Email |  {{ App\Models\User::where('id', $event->owner)->first()->email }} |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
