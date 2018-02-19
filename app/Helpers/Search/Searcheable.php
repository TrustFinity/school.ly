<?php

namespace App\Helpers\Search;

trait Searcheable {
	
	public function constructSearchTerm()
	{
		return $this->first_name.' '.$this->middle_name.''.$this->last_name.' '.$this->last_name.' '.$this->middle_name.' '.$this->first_name;
	}
	
}