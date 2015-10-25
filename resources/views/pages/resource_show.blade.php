@extends('layouts.app')

@section('title')
    {{$resource->title}}
@endsection

@section('content')
    <div class="row">
        <div class="col col-sm-3">
            @include('includes.category')
        </div>
        <div class="col col-sm-9">
            <div class="omb_login">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="resource_title">{{strtoupper($resource->title)}}</h3>
                    <iframe width="640" height="480"
                            src="{{ $resource->link }}" frameborder="0" allowfullscreen></iframe>

                    <div class="row center resource-data">
                        Category : <a href="{{route('resource.cat',['name' =>$resource->category->name])}}">
                            {{$resource->category->name}}</a>
                    </div>

                    <div class="row center resource-data">
                        Uploader : <a href="#">
                            {{$resource->user->firstname}} {{$resource->user->lastname}}</a>
                    </div>

                    <div class="row center">
                        <h3 class="resource_desc_label">Description</h3>

                        <div class="row center resource_description">
                            {{ $resource->description}}
                        </div>
                    </div>

                    @can('update-resource', $resource)
                    @include('includes.delete_resource_confirm')
                    <div class="btn-group action_button">
                        <a href="{{route('resource.edit',['id' =>$resource->id])}}" class="btn btn-primary">Edit
                            Resource</a>
                        <button class="btn btn-danger"
                                type="button"
                                data-toggle="modal"
                                data-target="#confirmDelete"
                                data-title="Delete User"
                                data-message="Are you sure you want to delete this resource ?">
                            <i class="glyphicon glyphicon-trash"></i>
                            Delete Resource
                        </button>

                    </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection