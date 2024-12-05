@component('mail::message')

<b>Name:</b>{{ $data['name'] }}<br>
<b>Email:</b>{{ $data['email'] }}<br>
<b>Subject:</b>{{ $data['subject'] }}(Sent From FTS Landing Pages)<br>
<b>Message:</b>{{ $data['message'] }}<br>
@if(isset($data['slug']))
<b>Slug:</b><a href="https://localbeings.com/{{ $data['slug']}}">https://localbeings.com/{{ $data['slug']}}</a>
@endif
@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to {{ $data['name'] }}
@endcomponent

@endcomponent
