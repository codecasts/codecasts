@extends('core::layout')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h3><i class="icon-user"></i> Meu Perfil</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <form role="form" class="form-sm" method="post" action="{{ route('profile.update') }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="username">Usuário</label>
                                <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
                            </div>
                            <div class="form-controls">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Atualizar</button>
                            </div>

                        </form>
                    </div>


                </div>



            </div>

        </div>
    </div>

@endsection
