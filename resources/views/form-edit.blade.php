@extends('layouts.main')
@section('title','Form Edit Vehicle')
@section('artikel')
<div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{$vh->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Merek</label>
                    <input type="text" name="merek" class="form-control" value="{{$vh->merek}}" require>
                </div>

                <div class="form-group">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control" value="{{$vh->model}}" require>
                </div>

                <div class="form-group">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control">
                        <option value="0">-Jenis Kendaraan-</option>
                        <option value="Bus" {{($vh->jenis=="Bus") ? "selected":""}}>Bus</option>
                        <option value="Kapal" {{($vh->jenis=="Kapal") ? "selected":""}}>Kapal</option>
                        <option value="Mobil" {{($vh->jenis=="Mobil") ? "selected":""}}>Mobil</option>
                        <option value="Sepeda" {{($vh->jenis=="Sepeda") ? "selected":""}}>Sepeda</option>
                        <option value="Sepeda Motor" {{($vh->jenis=="Sepeda Motor") ? "selected":""}}>Sepeda Motor</option>
                        <option value="Truk" {{($vh->jenis=="Truk") ? "selected":""}}>Truk</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="number" min="1900" max="2999" name="year" class="form-control" value="{{$vh->year}}" require>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{$vh->harga}}" require>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*" value="{{$vh->image}}">
                </div>

                <div class="form-group">
                    <img src="{{asset('/storage/'.$vh->image)}}" alt="{{$vh->poster}}" height="80" width="120">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection