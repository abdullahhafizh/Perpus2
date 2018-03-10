@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-light">
                <div class="card-header">User</div>

                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ route('register') }}" style="color: inherit;text-decoration: none;"><button type="button" class="btn btn-success btn-lg btn-block">Input User</button></a>
                    </div>
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
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".up{{ $user->id }}">Edit Hak Akses</button>
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=".del{{ $user->id }}">Hapus</button>
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

@foreach($users as $user)
<div class="modal fade up{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Hak Akses {{ $user->username }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('admin/user/'.$user->id.'/update') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">                        
                        <label for="status" class="col-form-label">{{ __('Hak Akses') }}</label>

                        <select id="status" class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" required>
                            <option value="0" {{ $user->status == 0 ? 'selected' : null }}>User Biasa</option>
                            <option value="1" {{ $user->status == 1 ? 'selected' : null }}>Administrator</option>
                        </select>

                        @if ($errors->has('status'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>                
                </div>
            </form>            
        </div>
    </div>
</div>
<div class="modal fade del{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapus {{ $user->username }}...</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin Ingin menghapus user {{ $user->username }}?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <a href="{{ url('admin/user/'.$user->id.'/destroy') }}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@include('akin.dtScript')
