@component('mail::message')

<p>{!! $data !!}</p>
 
@lang('messages.t_regards'),<br>
{{ config('app.name') }}<br>
@endcomponent