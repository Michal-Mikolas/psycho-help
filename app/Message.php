<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function thread()
	{
		return $this->hasOne(Thread::class);
	}
}
