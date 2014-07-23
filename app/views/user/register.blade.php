@extends('template')

@section('head')
<style>
  form {
    margin-top: 50px;
  }
</style>
@stop

@section('content')
<div class="col-sm-6 col-sm-offset-3">

    {{ Form::open([
        "autocomplete" => "off"
    ]) }}


    <div class="form-group">
        {{ Form::label("email", "Email Address") }}
        {{ Form::text("email", Input::old("email"), [
            "placeholder" => "Enter email",
            "class" => "form-control",
        ]) }}
    </div>
    <div class="form-group">
      {{ Form::label("password", "Password") }}
      {{ Form::password("password", [
          "placeholder" => "Password",
          "class" => "form-control",
      ]) }}
    </div>

    {{ Form::submit("Register", [
      "class" => "btn btn-default",
    ]) }}

  {{ Form::close() }}

</div>
@stop
