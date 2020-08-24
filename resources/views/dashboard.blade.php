@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
	
    <div class="box box-default">
      <div class="box-body">
        <div class="callout callout" style="background-color: #F9F9F9">
          <h4>Welcome!</h4>

          <p>Selamat datang di Control Panel Aplikasi Kriptografi Vernam Cipher & Hill Cipher
        Sebelum anda melakukan ekripsi dokumen, perlu diperhatikan beberapa hal penting sebelum mengenkripsi sebuah file dokumen yaitu sebagai berikut:</p>
        </div>
        <ul>
            <li>1. Dokumen yang akan di enkripsi hanya dokument format docx</li>
            <li>2. Dokumen yang dienkripsi hanya pada teks (karakter) dalam dokumen</li>
            <li>3. Jika dokumen berisi gambar, maka gambar tidak akan dienkripsi dan kemungkinan terjadi error pada proses enkripsi</li>
        </ul>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection