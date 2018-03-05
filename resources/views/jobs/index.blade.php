@extends('layouts.app')

@section('content')

    <a href="/jobs/create" type="button" class="btn btn-primary">Новий jobs</a><br><br>

    <table id="table-jobs"  class="table table-bordered table-hover table-striped" >
        <thead>
        <tr class="info" >
            <th> № </th>
            <th> recruiter_id</th>
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
                <td >{{$job->recruiter_id}} </td>
                <td >{{$job->title}}</td>
                <td >{{$job->description}}</td>


                <td class="danger" ><a href="/new-order/edit/{{$job->id}}">Редагувати</a> | <a href="/new-order/destroy/{{$job->id}}">Видалити</a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endsection