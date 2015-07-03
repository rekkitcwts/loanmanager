<?php

class Borrower extends Eloquent
{
	protected $table = 'borrowers';
	protected $softDelete = true;
	protected $fillable = array('lname','fname', 'mname', 'gender', 'home_address');
}