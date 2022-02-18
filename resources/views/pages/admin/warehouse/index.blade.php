@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard [Warehouse]</h1>
    </div>
    <!-- Card Cabangs -->
    <div class="row">
        @forelse ($cabangs as $cabang)
            
     
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">Farmaga {{$cabang->cabang}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cabang->orderan}} <small>order</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @empty
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">Farmaga {{$cabang->cabang}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0 <small>order</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        @endforelse
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h5 mb-0 text-gray-800">List of Distributors</h1>
    </div>
    <div class="row">
        @foreach ($distributors as $dist)


        <a class="col-xl-4 col-md-6 mb-4" href="{{url('/detailDist',$dist->id_distributor)}}">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text font-weight-bold text-primary text-uppercase mb-1">
                                {{$dist->nama_distributor}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dist->orderan}} <small>order</small>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </a>
        @endforeach
    </div>
    <!-- /.container-fluid -->
    @endsection
