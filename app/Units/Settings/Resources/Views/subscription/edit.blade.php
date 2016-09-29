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
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detalhes da Assinatura</h4>
                                    <div class="subscription-details">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tr>
                                                <td class="text-right">
                                                    Validade
                                                </td>
                                                <td>
                                                    @if($user->isExpired())
                                                        <label class="label label-danger">
                                                            Expirado em {{ with(new DateTime($user->expires_at))->format('d/m/Y') }}
                                                        </label>
                                                    @else
                                                        <label class="label label-success">
                                                            Expira em {{ with(new DateTime($user->expires_at))->format('d/m/Y') }}
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Plano</td>
                                                <td>
                                                    <label class="label label-primary">
                                                        {{ $subscription->plan_name }} (R$ {{ number_format(($subscription->price_cents / 100), 2, ',', '.') }})
                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right">Estado</td>
                                                <td>
                                                    @if($user->isSuspended())
                                                        <label class="label label-danger">
                                                            Suspensa
                                                        </label>
                                                    @else
                                                        <label class="label label-success">
                                                            Ativa
                                                        </label>
                                                    @endif
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Pagamentos Recorrentes</h4>
                                    Se deseja optar pela praticidade dos pagamentos automáticos, basta selecionar a opção <strong>"Usar este cartão de crédito em cobranças futuras"</strong> ao pagar sua próxima fatura.
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Alterar Ciclo de Cobrança</h4>

                                    <form role="form" class="form-sm form-horizontal" method="post" action="{{ route('subscription.update', 's') }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="action" value="plan">

                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <select name="plan" class="form-control">
                                                    @if($user->subscription_plan != 'P1M')
                                                        <option value="P1M">Assinatura Mensal (R$ 25,00)</option>
                                                    @endif
                                                    @if($user->subscription_plan != 'P6M')
                                                        <option value="P6M">Assinatura Semestral (R$ 125,00)</option>
                                                    @endif
                                                    @if($user->subscription_plan != 'P1Y')
                                                        <option value="P1Y">Assinatura Anual (R$ 250,00)</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-right">
                                                <button class="btn btn-primary" type="submit">Confirmar</button>
                                            </div>
                                        </div>










                                    </form>

                                </div>
                                <div class="col-md-6">
                                    <h4>@if($user->isSuspended()) Reativar Assinatura @else Suspender Assinatura @endif</h4>
                                    <form role="form" class="form-sm form-horizontal" method="post" action="{{ route('subscription.update', 's') }}">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if($user->isSuspended())
                                            <input type="hidden" name="action" value="activate">
                                        @else
                                            <input type="hidden" name="action" value="suspend">
                                        @endif

                                        <div class="row">
                                            <div class="input-group">


                                                <div class="col-md-9">
                                                    @if($user->isSuspended())
                                                        Caso a assinatura ainda não tenha expirado, uma nova fatura só será gerada próximo a data de expiração.
                                                    @else
                                                        Uma assinatura suspensa continuará válida até a data de expiração, porém novas faturas não serão geradas.
                                                    @endif

                                                </div>
                                                <div class="col-md-3">
                                                    @if($user->isSuspended())
                                                        <button class="btn btn-success" type="submit">Reativar</button>
                                                    @else
                                                        <button class="btn btn-danger" type="submit">Suspender</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">&nbsp;</div>
                        </div>

                        <div class="row"><hr></div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <h4>Faturas Recentes:</h4>
                                </div>
                                <div class="col-md-12">
                                    @if(count($subscription->recent_invoices))
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Vencimento</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th class="text-right">Ações</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subscription->recent_invoices as $inv)
                                                <tr>
                                                    <td>{{ with(new DateTime($inv->due_date))->format('d/m/Y') }}</td>
                                                    <td>{{$inv->total}}</td>
                                                    <td>
                                                        @if($inv->status == 'draft')
                                                            Rascunho
                                                        @elseif($inv->status == 'pending')
                                                            Pendente
                                                        @elseif($inv->status == 'partilly_paid')
                                                            Parcialmente Paga
                                                        @elseif($inv->status == 'paid')
                                                            Paga
                                                        @elseif($inv->status == 'canceled')
                                                            Cancelada
                                                        @elseif($inv->status == 'refunded')
                                                            Reembolsada
                                                        @elseif($inv->status == 'expired')
                                                            Expirada
                                                        @else
                                                            {{ $inv->status }}
                                                        @endif
                                                    </td>
                                                    <td class="text-right">
                                                        @if($inv->status == 'draft')
                                                            <a class="btn btn-sm btn-warning" target="_blank" href="{{$inv->secure_url}}">Visualizar</a>
                                                        @elseif($inv->status == 'pending')
                                                            <a class="btn btn-sm btn-warning" target="_blank" href="{{$inv->secure_url}}">Efetuar Pagamento</a>
                                                        @elseif($inv->status == 'partilly_paid')
                                                            <a class="btn btn-sm btn-warning" target="_blank" href="{{$inv->secure_url}}">Paga Parcialmente</a>
                                                        @elseif($inv->status == 'paid')
                                                            <a class="btn btn-sm btn-success" target="_blank" href="{{$inv->secure_url}}">Comprovante</a>
                                                        @elseif($inv->status == 'canceled')
                                                            <a class="btn btn-sm btn-default" target="_blank" href="{{$inv->secure_url}}">Visualizar</a>
                                                        @elseif($inv->status == 'refunded')
                                                            <a class="btn btn-sm btn-success" target="_blank" href="{{$inv->secure_url}}">Comprovante</a>
                                                        @elseif($inv->status == 'expired')
                                                            <a class="btn btn-sm btn-danger" target="_blank" href="{{$inv->secure_url}}">Expirada</a>
                                                        @else
                                                            {{ $inv->status }}
                                                        @endif

                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="col-md-12">
                                            Nenhuma Fatura Recente
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="row"><hr></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <h4>Histórico da Assinatura:</h4>
                                </div>
                                <div class="col-md-12">
                                    @if(count($subscription->logs))
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Descrição</th>
                                                <th>Detalhes</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($subscription->logs as $log)
                                                <tr>
                                                    <td>{{ with(new DateTime($log->created_at))->format('d/m/Y H:i:s')}}</td>
                                                    <td>{{$log->description}}</td>
                                                    <td>{{$log->notes}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        Nenhuma movimentação recente.
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>


                </div>



            </div>

        </div>
    </div>
@endsection
