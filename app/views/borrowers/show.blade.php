@extends("layout")
@section("content")
<h1>Viewing Borrower Info</h1>

<table class="table">
	<tr>
		<td><strong>Name</strong></td>
		<td>{{{ $borrower->lname . ', ' . $borrower->fname . ' ' . $borrower->mname }}}</td>
	</tr>
	<tr>
		<td><strong>Gender</strong></td>
		<td>{{{ $borrower->gender }}}</td>
	</tr>
	<tr>
		<td><strong>Home Address</strong></td>
		<td>{{{ $borrower->home_address }}}</td>
	</tr>
</table>
<a href="/borrowers/addloan/{{ $borrower->id }}" class="btn btn-success"><span class="glyphicon glyphicon-briefcase"></span> Add Loan</a>

<h3>Loans</h3>

<h3>Payment History</h3>
@stop

@section("rightsidebar")

@stop