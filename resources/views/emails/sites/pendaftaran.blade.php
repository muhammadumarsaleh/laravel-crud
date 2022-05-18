@component('mail::message')
# Pendaftaran Siswa

Selamat anda telah terdaftar di SMKN 1 PANGKEP

@component('mail::button', ['url' => 'smkn1pangkepumar.com'])
Klik disini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
