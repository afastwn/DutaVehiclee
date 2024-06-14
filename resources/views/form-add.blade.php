@extends('layouts.main')
@section('title','Form Add Movies')
@section('artikel')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/save" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Merek</label>
                    <input type="text" name="merek" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Model</label>
                    <input type="text" name="model" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Jenis</label>
                    <select name="jenis" class="form-control">
                        <option value="0">-Jenis Kendaraan-</option>
                        <option value="Bus">Bus</option>
                        <option value="Kapal">Kapal</option>
                        <option value="Mobil">Mobil</option>
                        <option value="Sepeda">Sepeda</option>
                        <option value="Sepeda Motor">Sepeda Motor</option>
                        <option value="Truk">Truk</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="number" min="1900" max="2999" name="year" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" require>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control-file" accept="image/*">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
@endsection