<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $table = "uploaded_file";
    protected $fillable = [
    	'plaintext',
    	'file',
    	'crypto',
    ];

    public function encrypted_file()
    {
        return $this->hasOne(EncryptedFile::class);
    }

    public function decrypted_file()
    {
        return $this->hasOne(DecryptedFile::class);
    }
}
