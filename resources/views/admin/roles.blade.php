@extends('layouts.dashboard')
@section('adminContent')
<table>
    <tr>
        <th>Nombre de usuario</th>
        <th>Administrador</th>
        <th>Editor</th>
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
                    <i class="fa fa-edit" style="color:black"></i>
                </button>
            </form>
        </td><td>
            <form style="display:inline" action="{{ route('admin.user.delete',$user->id) }}" method="GET">
            @method('DELETE')    
            {{ csrf_field() }}
                <button type="submit" id="delete" style="background: none;padding: 0px;border: none;color:red">
                    <i class="fa fa-trash" style="color:black"></i>
                </button>
            </form>
        </td>

    <tr>
        @endforeach
</table>
@endsection