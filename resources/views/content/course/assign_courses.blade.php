@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Assign Courses
        </div>
        <div class="card-body">
            <form action="{{route('save_assign_course')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Student</label>
                    <div class="col-sm-10">
                        <select class="form-control select2" name="student_id" required>
                            <option value="">Select Student</option>
                            @foreach ($students as $student)
                            <option value="{{$student->id}}">{{$student->name . ' - '. $student->email}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Courses</label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-tokenizer" name="courses[]" id="selected_courses"
                            multiple="multiple" required>
                            <option value="">Select Courses</option>
                            @foreach ($courses as $course)
                            <option value="{{$course->course_id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" style="float: right" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('.select2').select2();
    $(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
</script>

@endsection