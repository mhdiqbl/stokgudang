@extends('layouts.home')

@section('style')
    <link href=" {{ asset('admin/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('select2')
    <script src="{{ asset('admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#products_id').select2();
        });
    </script>
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Transaction</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" action="{{ route('transaction.update', $transaction->id) }}">
                        @csrf
                        @method('put')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="products_id">Product
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control col-7" id="products_id" name="products_id"
                                    value="{{ old('products_id', '') }}">
                                    @forelse ($product as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                    @empty
                                        <option value="">--Data Kosong--</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="jumlah">Jumlah
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control col-7" name="jumlah" id="jumlah"
                                    value="{{ old('jumlah', $transaction->jumlah) }}" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-4 col-sm-3 label-align" for="tanggal_transaksi">Tanggal
                                transaksi
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="date" class="form-control col-7" name="tanggal_transaksi"
                                    id="tanggal_transaksi"
                                    value="{{ old('tanggal_transaksi', $transaction->tanggal_transaksi) }}" required>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-4">
                                <button type="reset" class="btn btn-warning"><i class="fa fa-undo">
                                        Reset</i></button>
                                <button type="submit" class="btn btn-info"><i class="fa fa-plus-square">
                                        Edit</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
