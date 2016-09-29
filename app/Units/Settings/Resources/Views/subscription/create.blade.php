@extends('core::layout')

@section('title')
    Assinatura
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h3><i class="icon-credit-card"></i> Assinatura</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if($user->guest)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Você é nosso convidado!</h4>
                                            <small>Você é muito estimado pelo CODECASTS, e por isso seu acesso é gratuito.</small>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($user->admin)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Admin Confuso!?</h4>
                                            <small>Esqueceu que é um administrador do CODECASTS?</small>
                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Nenhuma Assinatura Encontrada</h4>
                                            <small>Uma assinatura é necessária para ter acesso a todo o conteúdo.</small>
                                            <br />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Selecionar Assinatura:</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <form role="form" class="form-sm form-horizontal" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="col-md-9">
                                                        <div class="input-group col-md-12">
                                                            <select name="plan" class="form-control col-md-12">
                                                                <option value="P1M">Assinatura Mensal (R$ 25,00)</option>
                                                                <option value="P6M">Assinatura Semestral (R$ 125,00)</option>
                                                                <option value="P1Y">Assinatura Anual (R$ 250,00)</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="input-group col-md-12">
                                                            <button class="btn btn-primary" type="submit">Confirmar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endif





                    </div>


                </div>



            </div>

        </div>
    </div>
@endsection
