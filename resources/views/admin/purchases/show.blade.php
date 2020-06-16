@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">
        <span class="pull-left">
            <h4 class="">{{ isset($title) ? $title : 'Compra'.' '. $purchase->id }}</h4>
        </span>
            <div class="pull-right">

                <form method="POST" action="{!! route('purchases.purchase.destroy', $purchase->id) !!}"
                      accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('purchases.purchase.index') }}" class="btn btn-primary"
                           title="Show All Purchase">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('purchases.purchase.create') }}" class="btn btn-success"
                           title="Create New Purchase">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('purchases.purchase.edit', $purchase->id ) }}" class="btn btn-primary"
                           title="Edit Purchase">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Purchase"
                                onclick="return confirm(&quot;Click Ok to delete Purchase.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <br>
        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Anadir Productos</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('spares.create')}}">
                    Agregar respuesto
                    <span class="fa fa-plus"></span>
                </a>
                <form action="{{route('purchases.spare.store', $purchase->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="purchase_id" value="{{ $purchase->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Producto</label>
                                <select class="form-control" id="select2"
                                        tabindex="-1" aria-hidden="true" name="spare_id">
                                    @foreach($spares as $spare)
                                        <option value="{{ $spare->id }}">
                                            {{ $spare->code . ' ' . $spare->description . $spare->brand->name .' Precio:'. $spare->price }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cantidad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">&#x2683;</span>
                                    </div>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio unidad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="unit_price" name="unit_price" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio total</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input readonly type="number" class="form-control" name="price" id="price">
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div>
                        <button class="btn btn-primary">
                            Agregar
                        </button>
                    </div>
                    <!-- /.row -->
                </form>
            </div>


            <!-- /.card-body -->
        </div>
        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Compra </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                @if(count($purchase->purchase_spare) == 0)
                    <div class="panel-body text-center">
                        Agrega productos para la compra
                    </div>
                @else
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Categoria</th>
                            <th>Descripcion</th>
                            <th>Compra (BS)</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchase->purchase_spare as $purchase_spare)
                            <tr>
                                <td>{{ $purchase_spare->spare->category->name }}</td>
                                <td>{{ $purchase_spare->spare->description }}</td>
                                <td>{{ $purchase_spare->unit_price }}</td>
                                <td>{{ $purchase_spare->quantity }}</td>
                                <td>{{ $purchase_spare->price }}</td>
                                <td>
                                    <form action="{{ route('purchases.spare.destroy',[$purchase->id,$purchase_spare->id]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" title="Borrar">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Precio total</th>
                                <td colspan="1">{{ $purchase->total_price }}</td>
                            </tr>
                        </tfoot>
                    </table>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-gray-dark">
            <div class="card-header">
                Datos
                <div class="card-tools">

                    <button type="button" id="hide-button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <dl class="card-body">
                <dt>ID</dt>
                <dd>{{ $purchase->id }}</dd>
                <dt>Proveedor</dt>
                <dd>{{ optional($purchase->Provider)->get_full_name() }}</dd>
                <dt>Precio total</dt>
                <dd>{{ $purchase->total_price }} BS</dd>
                <dt>Contacto</dt>
                <dd>{{ $purchase->contact }}</dd>
                <dt>Fecha creacion</dt>
                <dd>{{ $purchase->created_at }}</dd>
                <dt>Fecha actualizacion</dt>
                <dd>{{ $purchase->updated_at }}</dd>

            </dl>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/purchase/spare.js')}}">
    </script>
@endsection


