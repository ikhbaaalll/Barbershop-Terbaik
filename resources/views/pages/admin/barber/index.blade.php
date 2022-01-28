@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header p-2">
                            <h4>List Barber</h4>
                        </div>
                        <div class="card-body p-2">
                            <a href="{{ route('admin.barbers.create') }}" class="btn btn-primary mb-2">Add Barber</a>
                            <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>User</th>
                                        <th>Barber</th>
                                        <th style="width: 30px">Price</th>
                                        <th style="width: 30px">Order</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($barbers as $barber)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $barber->user->name }}</td>
                                            <td>{{ $barber->name }}</td>
                                            <td>{{ number_format($barber->price, 2) }}</td>
                                            <td>{{ $barber->orders_count }}</td>
                                            <td>
                                                <a href="{{ route('admin.barbers.order', $barber) }}"
                                                    class="btn btn-sm btn-outline-primary">Order</a>
                                                <a href="{{ route('admin.barbers.facilities', $barber) }}"
                                                    class="btn btn-sm btn-outline-success">Facility</a>
                                                <a href="{{ route('admin.barbers.services', $barber) }}"
                                                    class="btn btn-sm btn-outline-info">Service</a>
                                                <a href="{{ route('admin.barbers.capsters', $barber) }}"
                                                    class="btn btn-sm btn-outline-dark">Capster</a>
                                                <form action="{{ route('admin.barbers.destroy', $barber) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete {{ $barber->name }}?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "order": [],
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "ordering": false,
                "buttons": [
                    'excelHtml5',
                    'pdfHtml5', "colvis"
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
