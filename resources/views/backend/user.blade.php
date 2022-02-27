@php
    $page='user';
@endphp
@extends('backend.master.master')
@section('content')
<div class="row">
    <div class="col-md-8 m-auto">
        <a href="{{ route('singup') }}" class="btn btn-primary my-2"> Register </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1 ?>
            @foreach ($user as $users)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    <a href="{{ url('/dashboard/user/'.$users->id) }}" class="btn btn-danger py-1 px-3"
                     onclick="return confirm('Are You Sure ? Delete this!')"><i class="bi bi-trash"></i></a>
                </td>
            </tr>
            <?php $i++?>
            @endforeach
        </tbody>
    </table>
</div>
</div>

@endsection
