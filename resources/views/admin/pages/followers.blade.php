@extends('admin.layouts.main')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">

          <li><a href="{!! URL::route('admin.dashboard') !!}">Dashboard</a></li>
          <li class="active">Followers {!! ucwords($title)!!}</li>
        <?php
            $urlSocmed = false;

            switch ($title) {

                case 'facebook':
                    $urlSocmed = 'https://www.facebook.com/app_scoped_user_id/';
                    break;
                case 'twitter':
                    $urlSocmed = 'https://twitter.com/intent/user?user_id=';
                    break;
            }
        ?>
      </ol>
  </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Followers {!! ucwords($title) !!}</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Details Data Registrant
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Social ID</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($records as $key => $record)
                                <tr class="">
                                    <td>{!! $key+1 !!}</td>
                                    <td>{!! isset($record->name) ? $record->name : '-'!!}</td>
                                    <td>
                                        @if ($urlSocmed)
                                            <a target="_blank" href="{!! $urlSocmed.$record->socmed_id !!}">{!! $record->social_id !!}</a>
                                        @endif
                                        
                                    </td>
                                    <td><a href="{!! isset($record->name) ? URL::Route('admin.registrants.details',array($record->id)) : '' !!}" class="btn btn-default"><span class="glyphicon glyphicon-share-alt"></span></a></td>
                                </tr> 
                            @endforeach
                            

                        </tbody>
                    </table>
                    <?php echo $records->links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

@stop