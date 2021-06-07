@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Add Course
        </div>
        <div class="card-body">
            <form action="{{route('save_course')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Course Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="course_title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Course Description</label>
                    <div class="col-sm-10">
                        <textarea name="course_description" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Course Date </label>
                            <div class="col-7">
                                <input type="date" class="form-control" name="course_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Course Time </label>
                            <div class="col-7">
                                <input type="time" class="form-control" name="course_time" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" style="float: right" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

@endsection