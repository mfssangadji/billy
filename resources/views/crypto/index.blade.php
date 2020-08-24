@extends('layouts.app')
@section('title', 'Crypto')
@section('content')
    <div class="box box-default">
      <div class="box-body">
        <div class="callout callout" style="background-color: #F9F9F9">
          <h4>Upload File</h4>
          <p>Silahkan upload file (docx) pada form dibawah ini untuk melakukan @if($int == 1) dekripsi @else enkripsi @endif</p>
        </div>
        <div class="row">
		  <div class="col-md-12">
		      <form role="form" method="post" action="{{route('cryptopost')}}" enctype="multipart/form-data">
		        @csrf
		        <div class="box-body">

		          <input type="hidden" value="{{$int}}" name="crypto">
		          <div class="form-group @error('file') has-error @enderror">
		            <label for="file">Upload File</label>
		            <input type="file" name="file">
		            @error('file')
		              <span class="help-block">file tidak boleh kosong</span>
		            @enderror
		          </div>

		        </div>
		        <!-- /.box-body -->
		        <div class="box-footer">
		          <button type="submit" class="btn btn-primary">
		          		Upload
		          </button>
		        </div>
		      </form>
	      </div>
    </div>
    <!-- /.box -->
@endsection