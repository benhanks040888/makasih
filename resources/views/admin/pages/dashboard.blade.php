@extends('admin.layouts.main')

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
    <script type="text/javascript">
        Morris.Area({
          element: 'area-example',
          data : <?php echo ($usersGrafik); ?>,
          xkey: 'y',
          ykeys: 'x',
          labels: ['Registrants']
      });
    </script>
@stop

@section('content')


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Dashboard</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-facebook-square fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $facebookCount !!}</div>
                        <div>Facebook Login</div>
                    </div>
                </div>
            </div>
            <a href="{!! URL::Route('admin.dashboard.socmed',array('facebook')) !!}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-twitter fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $twitterCount !!}</div>
                        <div>Twitter Login</div>
                    </div>
                </div>
            </div>
            <a href="{!! URL::Route('admin.dashboard.socmed',array('twitter')) !!}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
          <div id="area-example"></div>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $completeUsers !!}</div>
                        <div>Complate Registrants</div>
                    </div>
                </div>
            </div>
            <a href="{!! URL::Route('admin.registrants',array('type' => '3')) !!}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $todayUsers !!}</div>
                        <div>Registrants Today</div>
                    </div>
                </div>
            </div>
            <?php
                $today = date('Y-m-d');
            ?>
            <a href="{!! URL::Route('admin.registrants',array('type' => '1', 'date_from' => $today ,'date_end' => $today)) !!}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $allUsers !!}</div>
                        <div>All Registrants</div>
                    </div>
                </div>
            </div>
            <a href="{!! URL::Route('admin.registrants') !!}">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
</div>

@stop