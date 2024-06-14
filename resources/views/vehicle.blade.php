@extends('layouts.main')
@section('title','Vehicle')
@section('artikel')
    <div class="card">
        <div class="card-header">
            <a href="/vehicle/add-form" class="btn btn-primary"><i class="bi bi-plus"></i>Vehicle</a> 
        </div>
            <div class="card-body">
                @if(session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Jenis</th>
                            <th>Year</th>
                            <th>Harga</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vh as $idx => $v)
                            <tr>
                                <td>{{$idx+1}}</td>
                                <td>{{$v->merek}}</td>
                                <td>{{$v->model}}</td>
                                <td>{{$v->jenis}}</td>
                                <td>{{$v->year}}</td>
                                <td>{{ number_format($v->harga, 0, '.', '.') }}</td>
                                <td><img src="{{asset('/storage/'.$v->image)}}" alt="{{$v->poster}}" height="80" width="130"></td>
                                <td>
                                    <a href="/vehicle/form-edit/{{$v->id}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="/delete/{{$v->id}}" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
    </div>
@endsection