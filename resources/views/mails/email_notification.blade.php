@component('mail::message')
Hello!!! **{{$name}}**,  {{-- use double space for line break --}}
Thank you for registering your company with us!

<!-- Click below to start working right now
@component('mail::button', ['url' => $link])
Go to your inbox -->
@endcomponent
Sincerely,
CM-project team.
@endcomponent