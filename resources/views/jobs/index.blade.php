@extends('layouts.app')

@section('content')

    <a href="/jobs/create" type="button" class="btn btn-primary">Новий jobs</a><br><br>

    <table id="table-jobs"  class="table table-bordered table-hover table-striped" >
        <thead>
        <tr class="info" >
            <th> № </th>
            <th> Name</th>
            <th><center>title</center></th>
            <th><center>description</center></th>
            <th ><center>Опції</center></th>
            {{--<th>Статус операції</th>--}}
        </tr>

        </thead>

        <tbody >
        @foreach($jobs as $job)

            <tr>
                <td >{{$job->id}} </td>
                <td >{{$job->recruiter->fullName()}} </td>
                <td >{{$job->title}}</td>
                <td >{{$job->description}}</td>


                <td class="danger" ><a href="/jobs/edit/{{$job->id}}">Редагувати</a> | <a href="/jobs/destroy/{{$job->id}}">Видалити</a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
{{$jobs->links()}}
    @endsection