@extends("layout")
@section("content")
<h1>Borrowers</h1>
<table id="borrowers" class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Name (Last, First Middle)</th>
            <th>Gender</th>
            <th>Date Added</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrowers as $row)
        <tr>
            <td>{{{ $row->lname . ', ' . $row->fname . ' ' . $row->mname }}}</td>
            <td>{{{ $row->gender }}}</td>
            <td>{{{ date('j F Y, h:i A',strtotime($row->created_at)) }}}</td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section("rightsidebar")
	<a class="btn btn-primary" href="{{ URL::route('borrowers.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New Borrower</a>
@stop