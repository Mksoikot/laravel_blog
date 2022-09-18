@extends('bakend.layouts.master')
@section('title','Post')
@section('content')
                    <div class="container-fluid px-4">
                        {{-- <h1 class="mt-4">Tables</h1> --}}
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                              <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Post List</li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table"></i> Add Post
                                <a style="float: right" href="{{url('admin/post/create')}}" class="float-right btn btn-sm btn-dark"> + Add Data</a>
                              </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Full Image</th>
                                            <th>Detail</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Full Image</th>
                                            <th>Detail</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $post)
                                              <tr>
                                                  <td>{{$post->id}}</td>
                                                  <td>{{$post->title}}</td>
                                                  <td><img width="80" src="{{asset('imgs/thumb').'/'.$post->thumb}}"></td>
                                                  <td><img width="80" src="{{asset('imgs/full').'/'.$post->full_img}}"></td>
                                                  <td>{{$post->detail}}</td>
                                                  <td>{{$post->tags}}</td>
                                                  <td>
                                                    <a class="btn btn-primary btn-sm" href="{{url('admin/post/'.$post->id.'/edit')}}">Update<a/>&nbsp;
                                                    <a onclick="return confirm ('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/post/'.$post->id.'/delete')}}">Delete<a/>
                                                  </td>
                                              </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

