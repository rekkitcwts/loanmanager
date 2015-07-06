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
            <td><a href="borrowers/{{ $row->id }}">{{{ $row->lname . ', ' . $row->fname . ' ' . $row->mname }}}</a></td>
            <td>{{{ $row->gender }}}</td>
            <td>{{{ date('j F Y, h:i A',strtotime($row->created_at)) }}}</td>
            <td><a href="borrowers/{{ $row->id }}/edit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a> <button id="delete{{$row->id}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation{{$row->id}}"><span class="glyphicon glyphicon-remove"></span> Remove</button>

            	<!-- Modal for Delete Course-->
					<div class="modal fade" id="deleteConfirmation{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Warning</h4>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete this borrower?</p>
									<p>This cannot be undone.</p>
								</div>
								<div class="modal-footer">
									{{ Form::open(array('url' => 'borrowers/' . $row['id'])) }}
									{{ Form::hidden('_method', 'DELETE') }}
									{{ Form::submit('Yes', ['class' => 'btn btn-danger']) }}

									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
									{{ Form::close() }}
								</div>
							</div>
						</div>
					</div>
					<!-- end of Modal for Delete Course -->

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section("rightsidebar")
	<a class="btn btn-primary" href="{{ URL::route('borrowers.create') }}"><span class="glyphicon glyphicon-plus"></span> Add New Borrower</a>
@stop