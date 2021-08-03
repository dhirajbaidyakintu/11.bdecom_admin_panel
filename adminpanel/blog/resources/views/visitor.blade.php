@extends('masterLayout.app')
@section('title', 'Visitor')
@section('content')
    <div class="container-fluid table-color">
        <div class="col-md-12">
            <h4 class="text-center text-success">VISITOR LIST</h4>
        </div>
        <div class="row">
            <div class="col-md-12 p-5">
                <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm"><strong>NO</strong></th>
                        <th class="th-sm"><strong>IP</strong></th>
                        <th class="th-sm"><strong>Time</strong></th>
                        <th class="th-sm"><strong>Date</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($visitorDataKey as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->ip_address}}</td>
                            <td>{{$data->visit_time}}</td>
                            <td>{{$data->visit_date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
@endsection




@section('script')
    <script type="text/javascript">
        //For visitor table
        $(document).ready(function() {
            $('#VisitorDt').DataTable({"order":false});
            $('.dataTables_length').addClass('bs-select');
            });
    </script>
@endsection
