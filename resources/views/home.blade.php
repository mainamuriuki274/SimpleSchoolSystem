@extends('layouts.app')

@section('content')
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
                <p style="text-align: center;" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
        @endforeach
    </div>
<div class="container">
    <h1>School Management System</h1>
    <!-- Button trigger modal -->
    <button style="float: right;" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        Add New Student
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/student/add" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Firstname</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" required autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

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
                                <input id="phonenumber" type="number" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" required>

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
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
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
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
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
                                    Add Student
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Admission Number</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Phonenumber</th>
            <th>Form</th>
            <th>Class</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->firstname}}</td>
                <td>{{$student->email}}</td>
                <td>+254 {{$student->phonenumber}}</td>
                <td>{{$student->form}}</td>
                <td>{{$student->form_class}}</td>
                <td><a href="/student/{{$student->id}}/edit/"><button style="color: blue;" class="btn"><i class="fa fa-edit"></i></button></a></td>
                <td><a href="/student/{{$student->id}}"><button style="color: red;" class="btn"><i class="fa fa-trash"></i></button></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
