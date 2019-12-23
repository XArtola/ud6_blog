@extends('layouts.dashboard')
@section('adminContent')
<h1>{{$user->name}}</h1>
<h1>Roles:</h1>

<table>
    <tr>
        <th>Rol</th>
        <th>Añadir rol</th>
        <th>Quitar rol</th>
        <th></th>
    </tr>
    @foreach($roles as $role)
    <tr>
        <td>{{$role->display_name}}</td>
        <td>
            <form action="{{route('admin.roles.create',$role->id)}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="{{$user->id}}">
                <button type="submit" id="add" style="background: none;padding: 0px;border: none;color:red" @if($user->roles->where('pivot.role_id',$role->id)->count())
            disabled @endif>
                    <i class="fa fa-check" style="color:black"></i>
                </button>
            </form>
        </td>
        <td>
            <form action="{{route('admin.roles.delete',$role->id)}}" method="POST">
                @method('DELETE')
                {{ csrf_field() }}
                <input type="hidden" name="userId" value="{{$user->id}}">
                <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
                    <i class="fa fa-times" style="color:black"></i>
                </button>

            </form>
        </td>
    </tr>
    @endforeach
    <tr>
</table>
@endsection