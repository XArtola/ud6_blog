@extends('layouts.dashboard')
@section('adminContent')

<h3 class="lead text-uppercase text-center py-4">Administración de roles para usuario {{$user->name}}</h3>

<hr class="bg-black">

<table class="table text-center">
    <tr>
        <th>Rol</th>
        <th>Estado</th>
        <th>Añadir rol</th>
        <th>Quitar rol</th>
        <th></th>
    </tr>
    @foreach($roles as $role)
    <tr>
        <td>{{$role->display_name}}</td>
        <td>{{$user->roles->where('pivot.role_id',$role->id)->count() ? 'Concedido' : 'Denegado'}}</td>
        <td>
            <form action="{{route('admin.roles.create',$role->id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="{{$user->id}}">
                <button type="submit" id="add" style="background: none;padding: 0px;border: none;color:red" @if($user->roles->where('pivot.role_id',$role->id)->count())
                    disabled @endif>
                    <!--<i class="fa fa-check fa-lg" style="color:{{$user->roles->where('pivot.role_id',$role->id)->count() ? 'black' : 'white'}}"></i>-->
                    <i class="fa fa-check fa-lg" style="color:green"></i>
                </button>
            </form>
        </td>
        <td>
            <form action="{{route('admin.roles.delete',$role->id)}}" method="POST">
                @method('DELETE')
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="{{$user->id}}">
                <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red" @if(!$user->roles->where('pivot.role_id',$role->id)->count())
                    disabled @endif>
                    <i class="fa fa-times fa-lg" style="color:red"></i>
                </button>

            </form>
        </td>
    </tr>
    @endforeach
    <tr>
</table>
@endsection