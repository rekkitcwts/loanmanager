<?php

class Loan extends Eloquent
{
	protected $table = 'loans';
	protected $softDelete = true;
	protected $fillable = array('loan_purpose','amount','interest','due_date');
}