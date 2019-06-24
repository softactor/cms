@extends('cms.layouts.app')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Chart</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
</ol>

    <div class='row'>
        <div class='col-md-12'>
            <h2>Test Chart</h2>
            <div id="cc"></div>
        </div>
    </div>
@section('dynamic_script_config_section')    
    @parent
    <script type="text/javascript">
        showChartData();
    </script>
@endsection
@endsection
