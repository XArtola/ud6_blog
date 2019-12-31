@extends('layouts.dashboard')
@section('adminContent')
<h3 class="lead text-uppercase text-center py-4">Administración de roles</h3>

<table class="table text-center">
    <tr>
        <th>Nombre de usuario</th>
        <th>Administrador</th>
        <th>Editor</th>
        <th>Administrar roles</th>
        <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>
            {{$user->name}}
        </td>
        <td>
            <input name="admin" type="checkbox" @if($user->roles->where('pivot.role_id',1)->count())
            checked @endif disabled>
        </td>
        <td>
            <input name="editor" type="checkbox" @if($user->roles->where('pivot.role_id',2)->count())
            checked @endif disabled>
        </td>
        <td>
            <form style="display:inline" action="{{ route('admin.roles.edit',$user->id) }}" method="GET">
                {{ csrf_field() }}
                <button type="submit" id="edit" style="background: none;padding: 0px;border: none;color:red">
                    <i class="fa fa-edit fa-lg" style="color:black"></i>
                </button>
            </form>
        </td><td>
            <form style="display:inline" action="{{ route('admin.user.delete',$user->id) }}" method="POST">
            @method('DELETE')    
            {{ csrf_field() }}
                <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
                    <i class="fa fa-trash fa-lg" style="color:black"></i>
                </button>
            </form>
        </td>

    <tr>
        @endforeach
</table>
@endsection