@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Hak Akses</th>
                                    <th>Option</th>
                                </tr>
                            </tfoot>  
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    @if($user->status==1)
                                    <td>Administrator</td>
                                    @else
                                    <td>User Biasa</td>
                                    @endif
                                    <td>
                                        <div class="text-center">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-sm btn-primary">
                                                    <a href="{{ url('admin/user/'.$user->id.'/edit') }}" style="color: inherit;text-decoration: none;">Edit</a>
                                                </label>
                                                <label class="btn btn-sm btn-danger">
                                                    <a href="{{ url('admin/user/'.$user->id.'/destroy') }}" style="color: inherit;text-decoration: none;">Hapus</a>
                                                </label>
                                            </div>
                                        </div>                       
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('akin.dtScript')
