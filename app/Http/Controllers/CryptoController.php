<?php

namespace App\Http\Controllers;

use \App\UploadedFile;
use \App\EncryptedFile;
use \App\DecryptedFile;
use Illuminate\Http\Request;

class CryptoController extends Controller
{
    public function crypto(Request $request)
    {
    	$int = $request->int;
        return view('crypto.index', compact('int'));
    }

    public function cryptopost(Request $request)
    {
    	$this->validate($request, [
    		"file" => "required",
    	]);

    	$ext = $request->file('file')->getClientOriginalExtension();
        $file = time().'.'.$ext;
        $request->file('file')->move('uploads/temp', $file);

        $phpWord = \PhpOffice\PhpWord\IOFactory::createReader('Word2007')->load('uploads/temp/'.$file);
		
		$mac = '';
		foreach($phpWord->getSections() as $section) {
            foreach($section->getElements() as $element) {
                foreach($element->getElements() as $m){
                	$mac .= $m->getText();
                }
            }
        }

        $id = UploadedFile::create([
        	'plaintext' => $mac,
        	'file' => $file,
        	'crypto' => $request->crypto,
        ]);

        return redirect("crypto/".$request->crypto.'/'.$id->id);
    }

    public function getcrypto(Request $request)
    {
    	$int = $request->int;
    	$uploaded = UploadedFile::find($request->id);
    	return view('crypto.view', compact('int', 'uploaded'));
    }

    public function postcrypto(Request $request)
    {
    	$filename = time();
    	$int = $request->int;
    	$uploaded = UploadedFile::find($request->id);
    	$key = $request->key;

    	if($int==0){
    		$sp_plaintext = str_split($uploaded->plaintext);
	    	$sp_key = str_split($key);

	    	if(count($sp_plaintext) % 2 !== 0){
	    		array_push($sp_plaintext, " ");
	    	}

	    	


	    	if(count($sp_plaintext) !== count($sp_key)){
	    		$s = (count($sp_plaintext)-count($sp_key));
	    		for($i=0; $i<$s; $i++){
	    			$a = ord(substr(implode('',$sp_plaintext), $i, 1));
	    			array_push($sp_key, substr($a, 0, 1));
	    		}
	    	}

	    	$key = implode('', $sp_key);
	    	// echo $key;
	    	// die();



	    	foreach($sp_plaintext as $pt){
	    		$ord_pt[] = (ord($pt)-32);
	    	}

	    	foreach($sp_key as $val){
	    		//echo $val, '<br />';
	    		$ord_key[] = ord(trim($val));
	    	}


	    	for($i=0; $i<count($ord_pt); $i++){
	    		$dec_cipher[] = (($ord_pt[$i]^$ord_key[$i])+32);
	    	}

	    	foreach($dec_cipher as $dc){
	    		$vernam[] = chr($dc);
	    	}

	    	$four_key = str_split(substr($key, 0, 4));
	    

	    	foreach($four_key as $key_matrix){
	    		$matrix[] = (ord($key_matrix)-31);
	    	}

	    	foreach($vernam as $val){
	    		$vernam_ord[] = (ord($val)-32);
	    	}

	    	

	    	$matrix_chunk = array_chunk($matrix,2);
	    	$vernam_ord_chunk = array_chunk($vernam_ord,2);
			foreach($vernam_ord_chunk as $keyv => $valv){
				foreach($matrix_chunk as $keym => $valm){
					foreach($valm as $keyms => $valms){
						$multiple[$keyv][] = ($valv[$keyms]*$matrix_chunk[$keym][$keyms]);
					}
				}
			}

			foreach($multiple as $mkeys => $marray){
				$mchunk[$mkeys] = array_chunk($marray,2);
			}

			

			foreach($mchunk as $mkey => $mval){
				foreach($mval as $mkeys => $mvals){

					$multiple_sum[$mkey][$mkeys] = mb_convert_encoding(chr((array_sum($mvals)%223)+32), 'UTF-8', 'HTML-ENTITIES');
				}
			}

			

			$result = '';
			foreach($multiple_sum as $keys => $vals){
				foreach($vals as $keyr => $valr){
					$result .= $valr;
				}
			}
	    	
			
			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
			$section->addText(
			    $result
			);

			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('uploads/'.($int == 0 ? "encrypt" : "decrypt").'/'.$filename.'.docx');

			$encrypted = EncryptedFile::create([
				'uploaded_file_id' => $uploaded->id,
				'key' => implode('', $sp_key),
				'file' => $filename.'.docx',
			]);

	    	return view('crypto.result', compact('int', 'uploaded', 'key', 'sp_key', 'vernam', 'result','encrypted'));
    	}else{
    		$results = array();
			preg_match_all('/./u', $uploaded->plaintext, $results);
	    	$sp_key = str_split($key);  
	    	$sp_plaintext = $results[0];
    		$key = $request->key;

    		// echo "Jumlah karakter plaintext: ".count($sp_plaintext), '<br />';
    		// echo count($sp_key);
    		// die();

	    	foreach($sp_plaintext as $keys => $vals){
	    		$ord_plaintext[] = (ord(mb_convert_encoding($vals, 'ISO-8859-1'))-32);
	    	}


	    	$four_key = str_split(substr($key, 0, 4));
	    	
	    	$c=0;
	    	foreach($four_key as $key_matrix){
	    		$matrix[] = (ord($key_matrix)-31);	
	    	}


	    	$matrix_chunk = array_chunk($matrix,2);

	    	foreach($matrix_chunk as $keys => $vals){
	    		foreach($vals as $keyc => $valc){
	    			if(($keys == 0) && ($keyc == 0)){
	    				$flip_matrix[$keys][$keyc] = ($valc*$matrix_chunk[1][1]);
	    			}elseif(($keys == 0) && ($keyc == 1)){
	    				$flip_matrix[$keys][$keyc] = ($valc*$matrix_chunk[1][0]);
	    			}
	    		}
	    	}


	    	$substraction = ($flip_matrix[0][0]-$flip_matrix[0][1]);


	    	// 180 ERROR HARUS 500
	    	for($i=1; $i<=500; $i++){
	    		if($substraction < 0){
	    			if((223+($substraction*$i)%223) == 1){
		    			$hasil = $i;
		    		}
	    		}else{
	    			if((($substraction*$i)%223) == 1){
		    			$hasil = $i;
		    		}
	    		}
	    	}


	    	foreach($matrix as $keys => $vals){
	    		$invers[0] = $matrix[3]; 
	    		$invers[1] = (223-$matrix[1]); 
	    		$invers[2] = (223-$matrix[2]); 
	    		$invers[3] = $matrix[0]; 
	    	}

	    	foreach($invers as $vals){
	    		$h_invers[] = (($vals*$hasil)%223);
	    	}

	    	$h_invers_chunk = array_chunk($h_invers,2);
	    	$ord_plaintext_chunk = array_chunk($ord_plaintext,2);

	    	foreach($ord_plaintext_chunk as $keyv => $valv){
				foreach($h_invers_chunk as $keym => $valm){
					foreach($valm as $keyms => $valms){
						$multiple[$keyv][] = ($valv[$keyms]*$h_invers_chunk[$keym][$keyms]);
					}
				}
			}
	    	


			foreach($multiple as $mkeys => $marray){
				$mchunk[$mkeys] = array_chunk($marray,2);
			}

			foreach($mchunk as $mkey => $mval){
				foreach($mval as $mkeys => $mvals){
					$multiple_sum[$mkey][$mkeys] = chr((array_sum($mvals)%223)+32);
				}
			}

			foreach($multiple_sum as $keys => $vals){
				foreach($vals as $keyc => $valc){
					$decrypt_items[] = (ord($valc)-32);
				}
			}


	    	foreach($sp_key as $val){
	    		$ord_key[] = ord($val);
	    	}


	    	for($i=0; $i<count($decrypt_items); $i++){
	    		$dec_cipher[] = chr(($decrypt_items[$i]^$ord_key[$i])+32);
	    	}

	    	$result = '';
			foreach($dec_cipher as $keys => $vals){
				$result .= $vals;
			}



			$phpWord = new \PhpOffice\PhpWord\PhpWord();
			$section = $phpWord->addSection();
			$section->addText(
			    $result
			);

			$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
			$objWriter->save('uploads/'.($int == 0 ? "encrypt" : "decrypt").'/'.$filename.'.docx');

			$decrypted = DecryptedFile::create([
				'uploaded_file_id' => $uploaded->id,
				'key' => $key,
				'file' => $filename.'.docx',
			]);

	    	return view('crypto.result', compact('int', 'uploaded', 'key', 'sp_key', 'result','decrypted'));
    	}
    }

    public function files()
    {
    	$uploaded = UploadedFile::all();
    	return view('files.index', compact('uploaded'));
    }

    public function del_files(Request $request)
    {
    	UploadedFile::destroy($request->id);
    	return redirect()->route('files');
    }

    public function about()
    {
    	return view('about');
    }
}
