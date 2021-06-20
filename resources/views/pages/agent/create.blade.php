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
                    <form method="post" action="{{ route('agent.store') }}" role="form">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Créer un agent</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input id="nom" type="text" class="form-control" name="nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input id="prenom" type="text" class="form-control" name="prenom">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Téléphone</label>
                                    <input id="phone" type="tel" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>
