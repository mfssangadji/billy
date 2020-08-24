@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="row">
        <div class="col-xs-12">
        	<div class="box">
	            <div class="box-header">
	              <h3 class="box-title">File Uploaded</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="datapost" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>Plaintext</th>
	                  <th>Key</th>
	                  <th>File</th>
	                  <th>Proses</th>
	                </tr>
	                </thead>
	                <tbody>
	                	@foreach($uploaded as $r)
	                		@if($r->crypto==1)
	                		<tr>
	                			<td>{{$r->plaintext}}</td>
	                				<td>{{$r->decrypted_file->key}}</td>
	                				<td>File Decrypt (<a href="/uploads/decrypt/{{$r->decrypted_file->file}}" target="_blank">{{$r->decrypted_file->file}}</a>)</td>
	                			<td>
	                				<form method="post" action="{{ route('files').'/'.$r->id }}" style="display:inline">
	                					@method('DELETE')
	                					@csrf
	                				<button type="submit" class="badge bg-red" onclick="return confirm('Apakan anda yakin?')" style="border: none;">hapus</button>
	                				</form>
	                			</td>
	                		</tr>
	                		@endif
	                	@endforeach
	                </tbody>
	              </table>
	            </div>
	        </div>
        </div>
    </div>
@endsection