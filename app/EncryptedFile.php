<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncryptedFile extends Model
{
    protected $table = 'encrypted_file';
    protected $fillable = [
    	'uploaded_file_id',
    	'key',
    	'file',
    ];

    public function uploaded_file()
    {
        return $this->belongsTo(UploadedFile::class);
    }
}
