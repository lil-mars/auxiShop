@extends('layouts.master')

@section('content')
    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading clearfix mb-4">

        <span class="pull-left">
            <h4 class="">{{ isset($title) ? $title : 'Datos de Venta ' }}</h4>
        </span>

            <div class="float-left">

                <form method="POST" action="{!! route('sales.sale.destroy', $sale->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('sales.sale.index') }}" class="btn btn-primary" title="Show All Sale">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('sales.sale.create') }}" class="btn btn-success" title="Create New Sale">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('sales.sale.edit', $sale->id ) }}" class="btn btn-primary" title="Edit Sale">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Sale"
                                onclick="return confirm(&quot;Click Ok to delete Sale.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>


            </div>
            <div class="float-right">
                <p>
                    <a href="#"
                       onclick="window.location=document.referrer;"
                       title="Return to the previous page"
                       class="btn btn-outline-danger">
                        Volver atras <i class="fa fa-backward"></i>
                    </a>
                </p>
            </div>

        </div>
        <div class="card card-gray-dark">
            <div class="card-header">
                <h3 class="card-title">Anadir Productos</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('sales.spare.store', $sale->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="sale_id" value="{{ $sale->id }}">
                    <input type="hidden" name="store_id" value="{{ $sale->store->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="select2">Producto</label>


                                <select class="form-control" id="select2" name="spare_id" tabindex="-1"
                                        class="js-states form-control-lg">
                                    <option value="" selected>--- Selecciona el producto ---</option>
                                    @foreach($store_spares as $store_spare)
                                        <option class="option-spare" value="{{$store_spare->spare->id}}" >
                                            {{'Codigo:'.$store_spare->spare->code.
                                             ' Original:'.$store_spare->spare->original_code .
                                              ' Desc:' .$store_spare->spare->description .
                                               ' Marca:'.$store_spare->spare->brand->name .
                                                ' Cantidad:'. $store_spare->quantity .
                                                 ' Precio:' . $store_spare->spare->price . 'Bs'
                                                 }}
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
                                    <input type="number" class="form-control" name="quantity" id="quantity" min="1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio unidad</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bs</span>
                                    </div>
                                    <input type="number" class="form-control" id="unit_price" name="unit_price"
                                           readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio total</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bs</span>
                                    </div>
                                    <input type="number" class="form-control" id="price" name="price" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Descuento</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bs</span>
                                    </div>
                                    <input type="number" class="form-control" id="discount" name="discount" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Precio Real</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Bs</span>
                                    </div>
                                    <input type="number" class="form-control" id="real_price" name="real_price"
                                           readonly>
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
        </div>


        <!-- /.card-body -->
    </div>
    <div class="card card-gray-dark">
        <div class="card-header">
            <h3 class="card-title">Venta</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <br>
            @if(count($sale->saleDetail) == 0)
                <div class="panel-body text-center">
                    Agrega productos a la venta
                </div>
            @else
                <table class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Precio (BS)</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Precio real</th>
                        <th>Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sale->saleDetail as $sale_spare)
                        <tr>
                            <td>{{ $sale_spare->spare->brand->name }}</td>
                            <td>{{ $sale_spare->spare->description }}</td>
                            <td>{{ $sale_spare->spare->price }}</td>
                            <td>{{ $sale_spare->quantity }}</td>
                            <td>{{ $sale_spare->price }}</td>
                            <td>{{ $sale_spare->discount }}</td>
                            <td>{{ $sale_spare->real_price }}</td>
                            <td>
                                <form action="{{ route('sales.spare.destroy',[$sale->id, $sale_spare->spare->id,$sale->store_id,$sale_spare->id]) }}"
                                      method="post">
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
                        <th colspan="6">Precio total</th>
                        <td colspan="1">{{ $sale->total_price }}</td>
                        <td colspan="1"></td>
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <dt>Cliente</dt>
                    <dd>{{ optional($sale->Client)->get_full_name() }}</dd>
                </div>
                <div class="col-4">
                    <dt>Tienda</dt>
                    <dd>{{ optional($sale->Store)->name }}</dd>
                </div>
                <div class="col-4">
                    <dt>Usuario</dt>
                    <dd>{{ optional($sale->User)->get_full_name() }}</dd>
                </div>
                <div class="col-4">
                    <dt>Precio Total</dt>
                    <dd>{{ $sale->total_price }}Bs</dd>
                </div>
                <div class="col-4">

                    <dt>Cantidad</dt>
                    <dd>{{ $sale->total_amount }}</dd>
                </div>
                <div class="col-4">

                    <dt>Creacion</dt>
                    <dd>{{ $sale->created_at }}</dd>
                </div>
                <div class="col-4">

                    <dt>Actualizacion</dt>
                    <dd>{{ $sale->updated_at }}</dd>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/sale/sale.js')}}"></script>
@endsection
