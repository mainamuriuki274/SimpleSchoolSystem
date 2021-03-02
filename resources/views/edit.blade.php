@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Edit Student Details</h1>
        <form action="/student/{{ $student->id }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="admission_number" class="col-md-4 col-form-label text-md-right">Admission Number</label>

                <div class="col-md-6">
                    <input id="admission_number" type="number" disabled value="{{ $student->id }}" class="form-control @error('admission_number') is-invalid @enderror" name="admission_number" required autofocus>

                    @error('admission_number')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

                <div class="col-md-6">
                    <input id="firstname" type="text" value="{{ old('firstname') ?? $student->firstname }}" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autofocus>

                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" value="{{ old('email') ?? $student->email }}" class="form-control @error('email') is-invalid @enderror" name="email" required>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phonenumber</label>

                <div class="col-md-6">
                    <input id="phonenumber" type="number" value="{{ old('email') ?? $student->phonenumber }}" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" required>

                    @error('phonenumber')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="form" class="col-md-4 col-form-label text-md-right">Form</label>

                <div class="col-md-6">
                    <select  id="form" class="form-control @error('form') is-invalid @enderror" name="form" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option
                            @if($student->form == 1)
                                selected="selected"
                            @endif
                                value="1">1</option>
                        <option
                            @if($student->form == 2)
                            selected="selected"
                            @endif
                            value="2">2</option>
                        <option
                            @if($student->form == 3)
                                 selected="selected"
                            @endif value="3">3</option>
                        <option
                            @if($student->form == 4)
                                 selected="selected"
                            @endif
                                 value="4">4</option>
                    </select>
                    @error('form')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="form_class" class="col-md-4 col-form-label text-md-right">Class</label>

                <div class="col-md-6">
                    <select  id="form_class" class="form-control @error('form_class') is-invalid @enderror" name="form_class" required>
                        <option disabled selected value> -- select an option -- </option>
                        <option
                            @if($student->form_class == "A")
                            selected="selected"
                            @endif
                            value="A">A</option>
                        <option
                            @if($student->form_class == "B")
                            selected="selected"
                            @endif
                            value="B">B</option>
                        <option
                            @if($student->form_class == "C")
                            selected="selected"
                            @endif
                            value="C">C</option>
                        <option
                            @if($student->form_class == "D")
                            selected="selected"
                            @endif
                            value="D">D</option>
                        <option
                            @if($student->form_class == "E")
                            selected="selected"
                            @endif
                            value="E">E</option>
                        <option
                            @if($student->form_class == "F")
                            selected="selected"
                            @endif
                            value="F">F</option>
                    </select>
                    @error('form_class')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button style="width: 100%;" type="submit" class="btn btn-primary">
                        Edit Student Details
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
