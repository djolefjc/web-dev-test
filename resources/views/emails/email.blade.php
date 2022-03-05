@component('mail::message')
{!!$email_data!!}
@component('mail::button', ['url' => url()->to('/')])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
