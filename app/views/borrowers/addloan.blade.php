@extends("layout")
@section("content")
{{{ $borrower }}}
<h1>Add Loan for {{{ $borrower->fname . ' ' . $borrower->lname }}}</h1>

{{ Form::open(array('url' => '/borrowers/addloanhelper/' . $borrower->id,
			'autocomplete' => 'off',
			'class' => 'form-horizontal'
			)) }}


{{ Form::close() }}
@stop

@section("rightsidebar")
@stop