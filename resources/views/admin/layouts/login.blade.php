<!DOCTYPE html>
<html>
@section('htmlheader')
  @include('admin.layouts.partials.html-header')
@show

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>{{ config('admin.name') }}</b>
    </div>

    <div class="login-box-body">
      <p class="login-box-msg">登录</p>

      <form action="{{ route('login') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group has-feedback {{ !$errors->has('email') ?: 'has-error' }}">

          @if($errors->has('email'))
            @foreach($errors->get('email') as $message)
              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
            @endforeach
          @endif

          <input type="input" class="form-control" placeholder="请输入您的邮箱" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">

          @if($errors->has('password'))
            @foreach($errors->get('password') as $message)
              <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
            @endforeach
          @endif

          <input type="password" class="form-control" placeholder="请输入您的密码" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4 col-md-offset-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  @section('scripts')
      @include('admin.layouts.partials.scripts')
  @show
</body>
</html>
