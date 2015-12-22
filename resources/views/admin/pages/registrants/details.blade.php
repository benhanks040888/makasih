@extends('admin.layouts.main')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">

          <li><a href="{!! URL::route('admin.dashboard') !!}">Dashboard</a></li>
          <li class="active">{!!$record->name !!}</li>

      </ol>
  </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Details</h1>
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

                        <tbody>
                        

                            <tr class="">
                                <td><b>Register Date</b></td>
                                <td><b>{!!$record->created_at !!}</b></td>
                            </tr>

                            <tr class="">
                                <td>Name</td>
                                <td>{!!$record->name !!}</td>
                            </tr>

                             <tr class="">
                                <td>Social ID</td>
                                <td>{!!$record->social_id !!}</td>
                            </tr> 
                          
                            <tr class="">
                                <td>Social Type</td>
                                <td>{!!$record->social_type !!}</td>
                            </tr> 
                          
                            <tr class="">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] Name</td>
                                <td>{!! $record->prc_name ? $record->prc_name : '-' !!}</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] Email</td>
                                <td>{!! $record->prc_email ? $record->prc_email : '-' !!}</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] Address</td>
                                <td>{!! $record->prc_address ? $record->prc_address : '-' !!}</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] Province</td>
                                <td>{!! $record->prc_province ? $record->prc_province : '-' !!}</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] City</td>
                                <td>{!! $record->prc_city ? $record->prc_city : '-' !!}</td>
                            </tr> 

                            <tr class="">
                                <td>[Apply PRC] Phone</td>
                                <td>{!! $record->prc_phone ? $record->prc_phone : '-' !!}</td>
                            </tr> 
                          
                            <tr class="">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr> 
                    
                            <tr class="">
                                <td>[Reward] Reward</td>
                                <td>{!! isset($record->reward->name) ? $record->reward->name : "-"!!}</td>
                            </tr> 
                    
                            <tr class="">
                                <td>[Reward] Story</td>
                                <td>{!! $record->reward_story ? $record->reward_story : "-"!!}</td>
                            </tr> 
                    
                            <tr class="">
                                <td>[Reward] Shared</td>
                                <td>{!! $record->reward_shared ? 'Yes' : "No"!!}</td>
                            </tr> 
                          
                            <tr class="">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr> 
                    
                            <tr class="">
                                <td>[Cart] items</td>
                                <td>
                                    @foreach($record->items as $key => $value)
                                        <a target="_blank" href="{!! URL::Route('admin.settings.items.edit',array($value->id)) !!}">{!! $value->name !!}</a><br>
                                    @endforeach
                                </td>
                            </tr> 
                          
                            <tr class="">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr> 
                    
                            <tr class="">
                                <td>[Point] Point Bank</td>
                                <td>
                                    <table border="0">
                                        @foreach($record->points()->select('name',DB::raw('SUM(point) as points'))->groupBy('name')->get() as $key => $value)
                                        <tr>
                                            <td>{!! $value->name !!}</td>
                                            <td>&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;</td>
                                            <td>{!! $value->points !!}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Total Point</td>
                                            <td>&nbsp;&nbsp;&nbsp;=&nbsp;&nbsp;&nbsp;</td>
                                            <td>{!! $record->total_point !!}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> 

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@stop