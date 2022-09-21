@extends('layouts.dashboard')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tambah Materi</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i></i> Tambah Materi Baru
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Materi</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kelas</label>
                            <div class="styled-select">
                            <select>
                                <option>IT & Multimedia</option>
                                <option>Digital & Online Business</option>
                                <option>Business Support</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi Materi</label>
                            <input type="text" class="form-control" style="height:150px">
                        </div>
                    </div>
                </div>     
                <div class="form-group">
                    <label>Upload File Materi</label>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Pilih file: <input type="file" name="berkas" />
                 </form>  
                
                </div>   
                <p><a href="#0" class="btn btn-primary plus float-right">Save</a></p>   
                </div>
                
        <!-- /tables-->
    </div>
</div>

@endsection
