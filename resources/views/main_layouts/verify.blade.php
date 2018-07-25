<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

<div>
    {{ __('validation.other.'.'Hi') }} {{ $name }},
    <br>
    {{ __('validation.other.'.'Thank you for creating an account with us. Don\'t forget to complete your registration!') }}
    <br>
    {{ __('validation.other.'.'Please click on the link below or copy it into the address bar of your browser to confirm your email address') }}:
    <br>

    <a href="{{ url('user/verify', $verification_code)}}">{{ __('validation.other.'.'Confirm my email address') }} </a>

    <br/>
</div>

</body>
</html>