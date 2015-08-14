<?php 

class Tank extends Eloquent{

	protected $table = 'tank_data';

	protected $fillable = array('id', 'level','created_at','updated_at');
}

?>