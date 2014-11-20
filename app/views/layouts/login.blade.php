@extends('layouts.main')
@section('content')
  <div class="wrapper">
    <form class="form-signin" method="post" action="./login">       
      <h2 class="form-signin-heading">Please login</h2>
      
      <input type="text" id="account" name="account" value="" size="60" maxlength="255" class="valid form-text required" placeholder="Username"/>
      <span class="text-danger">{{$errors->first('account')}}</span>
      <input type="password" id="password" name="password" value="" size="60" maxlength="255" class="valid form-text required" placeholder="Password"/> 
      <span class="text-danger">{{$errors->first('password')}}</span>
      <input type="submit" id="submit-contact" value="เข้าสู่ระบบ" class="form-submit" />
      <br/><br/><br/>
    <?php if(@$error){ ?>
      <span class="text-danger">{{Lang::get('admin.wrongpwd')}}</span>
      <?php } ?>
    </form>

  </div>
@stop