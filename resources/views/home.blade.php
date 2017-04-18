@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>User's List</b></div>
                <table class="table">
                    <thead class="table table-inverse">
                      <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as  $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td class="col-md-6">
                            <ul>
                              <a href="{{ url($user->id.'/edit')}}" class="btn btn-sm btn-success">Edit</a>
                              <!--<button data-toggle="modal" ng-click="view(value.id)" data-target="#view-data" class="btn btn-sm btn-primary">View</button>-->
                              <a href="{{ url($user->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                            </ul>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
            <div>
              <a class="btn btn-primary" href="{{ url('/create') }}">
                  {{ 'Create' }}
              </a>
            </div>
        </div>
    </div>
</div>
@endsection
