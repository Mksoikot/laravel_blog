@extends('bakend.layouts.master')
@section('content')
                    <div class="container-fluid px-4">
                        {{-- <h1 class="mt-4">Tables</h1> --}}
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                              <a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Category List</li>
                          </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table"></i> Add Category
                                <a style="float: right" href="{{url('admin/category/create')}}" class="float-right btn btn-sm btn-dark"> + Add Data</a>
                              </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $category)
                                              <tr>
                                                  <td>{{$category->id}}</td>
                                                  <td>{{$category->title}}</td>
                                                  <td><img width="80" src="{{asset('imgs').'/'.$category->image}}"></td>
                                                  <td>
                                                    <a class="btn btn-primary btn-sm" href="{{url('admin/category/'.$category->id.'/edit')}}">Update<a/>&nbsp;
                                                    <a onclick="return confirm ('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/category/'.$category->id.'/delete')}}">Delete<a/>
                                                  </td>
                                              </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection

