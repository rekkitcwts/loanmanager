@extends("layout")
@section("content")

<h1>Edit Borrower</h1>

{{ Form::open([
        "url"        => "borrowers/update/" . $borrower->id,
        "autocomplete" => "off",
        "class" => "form-horizontal"
    ]) }}

<div class="form-group">
    {{ Form::label('lname', 'Last Name') }} <h style="color:red">*</h>
    {{ Form::text('lname', $borrower->lname) }}
</div>

<div class="form-group">
    {{ Form::label('fname', 'First Name') }} <h style="color:red">*</h>
    {{ Form::text('fname', $borrower->fname) }}
</div>

<div class="form-group">
    {{ Form::label('mname', 'Middle Name (if no middle name, put a dash)') }} <h style="color:red">*</h>
    {{ Form::text('mname', $borrower->mname) }}
</div>

<div class="form-group">
    {{ Form::label('gender', 'Gender') }} <h style="color:red">*</h>
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>

<div class="form-group">
    {{ Form::label('home_address', 'Home Address') }} <h style="color:red">*</h>
    {{ Form::text('home_address', $borrower->home_address) }}
</div>

{{ Form::submit('Edit Borrower', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop

@section("rightsidebar")
	
@stop