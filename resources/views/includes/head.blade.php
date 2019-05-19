<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Virtual Clinic</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  @if(auth()->user())
  <script>
    window.user = {
            id: {{ auth()->id() }},
            name: "{{ auth()->user()->name }}"
        };

        window.csrfToken = "{{ csrf_token() }}";
  </script>
  @endif
</head>

<body>