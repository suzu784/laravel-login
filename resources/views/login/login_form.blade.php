<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ログインフォーム</title>
  {{-- Scripts --}}
  <script src="{{asset('js/app.js')}}"></script>
  {{-- Styles --}}
  <link rel="stylesheet" href="{{asset('css/signin.css')}}">
</head>

<body>
  <form class="form-signin" method="POST" action="{{route('login')}}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">ログインフォーム</h1>
    @foreach ($errors->all() as $error)
    <ul>
      <li>{{ $error }}</li>
    </ul>
    @endforeach

    <x-alert type="danger" :session="session('danger')" />

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required
      autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button>
  </form>
</body>

</html>