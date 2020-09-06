@component('mail::message')

{{ $data['nom']}}
<br>
{{ $data['mail']}}
<br>
<strong>
{{ $data['msg']}}
</strong>
@endcomponent
