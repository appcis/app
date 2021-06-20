@if(session()->has('success'))
    @push('alert')
        <div class="alert alert-success alert-dismissible m-3">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session()->get('success') }}
        </div>`
    @endpush
@endif

<x-app-layout>
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Agents</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header d-flex align-items-center">
                            <h5 class="m-0 mr-auto">Liste des agents</h5>
                            <div class="text-right">
                                <a href="{{ route('agent.create') }}" class="btn btn-block btn-primary">Ajouter un
                                    agent</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Téléphone</th>
                                    <th style="width: 40px">Statut</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($agents as $agent)
                                    <tr data-action="{{ route('agent.edit', $agent) }}">
                                        <td>{{ $agent->id }}</td>
                                        <td>{{ $agent->nom }}</td>
                                        <td>{{ $agent->prenom }}</td>
                                        <td>{{ $agent->phone }}</td>
                                        {{-- <td><span class="badge bg-success">Activé</span></td>--}}
                                        <td><span class="badge bg-danger">Désactivé</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Aucun agent créer</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{--<ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>--}}
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>
