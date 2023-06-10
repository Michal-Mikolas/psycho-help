<?php

namespace App\Http\Controllers;

use App\Message;
use App\Thread;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	public function store($key = '', Request $request)
	{
		$values = $request->post();

		$t = new Thread();
		$t->password_hash = Hash::make($values['password']);
		$t->save();

		$t->key = $this->generateSecretKey($t->id);
		$t->save();

		$m = new Message();
		$m->message = $values['message'];

		$t->messages()->save($m);

		return redirect()->route('thread', $t->key);
	}


	protected function generateSecretKey($id)
	{
		$syls = ['0' => 'ka', '1' => 'ko', '2' => 'ke', '3' => 'ki', '4' => 'ba', '5' => 'bo', '6' => 'be', '7' => 'bi', '8' => 'ta', '9' => 'to', 'a' => 'te', 'b' => 'ti', 'c' => 'wa', 'd' => 'wo', 'e' => 'we', 'f' => 'wi'];
		$hex = dechex($id) . dechex(rand(16, 255));

		$result = '';
		foreach (str_split($hex) as $letter) {
			$result .= $syls[$letter];
		}

		return $result;
	}

}
