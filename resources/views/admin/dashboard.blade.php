@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Your application's dashboard.
                    <a href="stok/stok">Stok</a>
                    <a href="penerbit/penerbit">Penerbit</a>
                    <a href="buku/buku">Buku</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
