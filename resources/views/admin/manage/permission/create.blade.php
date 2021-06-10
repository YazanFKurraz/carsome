@extends('admin.layouts.app')
@section('title')
    <title>Create New Permission</title>
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.permissions')}}">Manage Permissions</a></li>
                        <li class="breadcrumb-item active">Create New Permission</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Create New Permission</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.permission.store')}}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="form-check-inline">
                                <label for="form-check-label">
                                    <input type="radio" class="form-check-input" name="permission_type"
                                           v-model="permission_type" value="basic">Basic Permisstion
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label for="form-check-label">
                                    <input type="radio" class="form-check-input" name="permission_type"
                                           v-model="permission_type" value="crud">CRUD Permisstion
                                </label>
                            </div>
                        </div>
                        <div class="row" v-if="permission_type == 'basic'">
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="dispaly_name">Name (Display Name)</label>
                                    <input type="text" class="form-control" name="display_name">
                                </div>
                                @error('display_name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                @error('name')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-grupe">
                                    <label for="discription">Discription</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                                @error('description')
                                <span class="text-danger"> {{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row" v-if="permission_type == 'crud'">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="resource">Resource</label>
                                            <input type="text" class="form-control" name="resource" v-model="resource">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="crudSelected"
                                                           v-model="crudSelected" value="create">Create
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="crudSelected"
                                                           v-model="crudSelected" value="read">Read
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="crudSelected"
                                                           v-model="crudSelected" value="update">Update
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="crudSelected"
                                                           v-model="crudSelected" value="delete">Delete
                                                </label>
                                            </div>
                                            <input type="hidden" name="crud_selected" :value="crudSelected">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" v-if="resource.length >= 3 && crudSelected.length > 0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Decription</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in crudSelected" :key="index">
                                            <td v-text="crudName(item)"></td>
                                            <td v-text="crudSlug(item)"></td>
                                            <td v-text="crudDescription(item)"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Create permission</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('js/app.js')}}"></script>
    <script>

        var app = new Vue({
            el: '#app',
            data: {
                permission_type: 'basic',
                crudSelected: ['create', 'read', 'update', 'delete'],
                resource: ''
            },
            methods: {
                crudName: function (item) {
                    return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1)
                },
                crudSlug: function (item) {
                    return item.toLowerCase() + "-" + this.resource.toLowerCase()
                },
                crudDescription: function (item) {
                    return "Allow a user to" + " " + item.toUpperCase() + " " + this.resource.substr(0, 1).toUpperCase() + this.resource.substr(1)
                },
            }
        });

    </script>
@endsection
