@extends('layouts.dashboard')
@section('adminContent')
<h3 class="lead text-uppercase text-center py-4">Administrador: {{auth()->user()->name}}</h3>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h4>Notificaciones</h4>
            <ul class="list-unstyled">
                <li>
                    <h5 class="font-weight-bold">Lorem ipsum</h5>
                    <p class="text-justify">Dolor sit amet, consectetur adipiscing elit. Ut in lacus feugiat, sagittis nisl nec, tempor eros. Proin vitae sem non felis ornare varius id ac mauris. Praesent nec blandit sapien, non iaculis orci. Praesent sed tortor a ex fermentum suscipit eget non ligula.</p>
                </li>
                <li>
                    <h5 class="font-weight-bold">Lorem ipsum</h5>
                    <p class="text-justify">Dolor sit amet, consectetur adipiscing elit. Ut in lacus feugiat, sagittis nisl nec, tempor eros. Proin vitae sem non felis ornare varius id ac mauris. Praesent nec blandit sapien, non iaculis orci. Praesent sed tortor a ex fermentum suscipit eget non ligula.</p>
                </li>
                <li>
                    <h5 class="font-weight-bold">Lorem ipsum</h5>
                    <p class="text-justify">Dolor sit amet, consectetur adipiscing elit. Ut in lacus feugiat, sagittis nisl nec, tempor eros. Proin vitae sem non felis ornare varius id ac mauris. Praesent nec blandit sapien, non iaculis orci. Praesent sed tortor a ex fermentum suscipit eget non ligula.</p>
                </li>

            </ul>
        </div>

        <div class="col-4">

        </div>
    </div>
</div>
@endsection