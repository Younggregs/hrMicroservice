@extends('layouts.master')

@section('content')

  <div class="item">
    <div class="item-bg">
      <img src="/images/a2.jpg" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href="#" class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="/images/a2.jpg">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h4 class="m-a-0 m-b-sm">{{$employee->surname}} {{$employee->other_names}}</h4>
            <p class="text-muted"><span class="m-r">UX/UI Director</span> <small><i class="fa fa-map-marker m-r-xs"></i>{{$employee->address}}</small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded b-a btn-sm">
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-linkedin cyan-600"></i>
              </a>
            </div>
            <a href="#" class="btn btn-sm warn rounded success active m-b" data-ui-toggle-class="success">
              <span class="inline">Follow</span>
              <span class="none">Following</span>
            </a>
          </div>
        </div>
        <!--
        <div class="col-sm-5">
          <p class="text-md profile-status">I am feeling good!</p>
          <button class="btn btn-sm rounded btn-outline b-success" data-toggle="collapse" data-target="#editor">Edit</button>
          <div class="collapse box m-t-sm" id="editor">
            <textarea class="form-control no-border" rows="2" placeholder="Type something..."></textarea>
          </div>
        </div>
        -->
      </div>
    </div>
  </div>
  <div class="white bg b-b p-x">
    <div class="row">
      <div class="col-sm-6 push-sm-6">
        <div class="p-y text-center text-sm-right">
            <a href="/employee/{{$employee->id}}/edit" class="btn rounded b-dark">Edit</a>
          <!--
          <a href="#" class="inline p-x b-l b-r text-center">
            <span class="h4 block m-a-0">250</span>
            <small class="text-xs text-muted">Following</small>
          </a>
          <a href="#" class="inline p-x text-center">
            <span class="h4 block m-a-0">89</span>
            <small class="text-xs text-muted">Activities</small>
          </a>
          -->
        </div>
      </div>
      <div class="col-sm-6 pull-sm-6">
        <div class="p-y-md clearfix nav-active-dark">
          <ul class="nav nav-pills nav-sm">
            <li class="nav-item active">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_1">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_2">Employee Setup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_3">Bank Setup</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="tab" data-target="#tab_4">Pension</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="padding">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="tab-content">      
          <div class="tab-pane p-v-sm active" id="tab_1">
            <div class="streamline m-b">
                <!-- Begin -->
                <div class="row m-b">
                  <div class="col-xs-6">
                    <small class="text-muted">Home Phone</small>
                    <div class="_500">{{$employee->mobile_home}}</div>
                  </div>
                  <div class="col-xs-6">
                    <small class="text-muted">Work Phone</small>
                    <div class="_500">{{$employee->mobile_work}}</div>
                  </div>
                </div>
                <div class="row m-b">
                  <div class="col-xs-6">
                    <small class="text-muted">Gender</small>
                    <div class="_500">{{$employee->gender}}</div>
                  </div>
                  <div class="col-xs-6">
                    <small class="text-muted">Date of Birth</small>
                    <div class="_500">{{$employee->dob}}</div>
                  </div>
                </div>
                <div>
                  <small class="text-muted">Bio</small>
                  <div>Nil</div>
                </div>
                <!-- End -->
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_2">
            <div class="streamline">
                <!-- Begin -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Organization Setup</h2><small>Employee Information.</small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    <form action="{{ URL::secure('/') }}/api/dropzone" class="dropzone white">
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" class="form-control" required>                        
                                    </div>
                                    <div class="row m-b">
                                      <div class="col-sm-6">
                                        <label>Enter password</label>
                                        <input type="password" class="form-control" required id="pwd">   
                                      </div>
                                      <div class="col-sm-6">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" data-parsley-equalto="#pwd" required>      
                                      </div>   
                                    </div>
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
            </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_3">
              <div class="row row-sm">
                <!-- BEGIN -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Bank Setup</h2><small>Bank Information.</small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    <form>
                                    <div class="form-group">
                                      <label>Account Name</label>
                                      <input type="text" name="bank_account_name" class="form-control" required>                        
                                    </div>
                                    <div class="row m-b">
                                      <div class="col-sm-6">
                                        <label>Bank</label>
                                        <select class="form-control c-select" name="bank_id" id="InputEditBank">
                                            <option value="Percentage">UBA</option>
                                            <option value="Amount">Access Bank</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <label>Sort Code</label>
                                        <input type="text" name="sort_code" class="form-control">      
                                      </div>   
                                    </div>
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END -->
              </div>
          </div>
          <div class="tab-pane p-v-sm" id="tab_4">
            <!-- BEGIN -->
            <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h2>Pension Setup</h2><small>Pension Information.</small></div>
                        <div class="box-divider m-a-0"></div>
                        <div class="box-body">
                            <div class="app-body">
                                <div class="padding">
                                    <form>
                                    <div class="row m-b">
                                      <div class="col-sm-6">
                                        <label>Name of PFA</label>
                                        <select class="form-control c-select" name="pfa" id="InputEditBank">
                                            <option value="Percentage">TRUST FUND</option>
                                            <option value="Amount">PENCOM</option>
                                        </select>
                                      </div>
                                      <div class="col-sm-6">
                                        <label>Pin Number</label>
                                        <input type="number" name="pin_number" class="form-control">      
                                      </div>   
                                    </div>
                                    <button type="submit" class="btn black m-b">SAVE</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!--- END -->
          </div>
        </div>
      </div>
      <!--
      <div class="col-sm-4 col-lg-3">
        <div>
          <div class="box info">
            <div class="box-body">
              <a href="#" class="pull-left m-r">
                <img src="/images/a0.jpg" class="img-circle w-40">
              </a>
              <div class="clear">
                <a href="#">@Mike Mcalidek</a>
                <small class="block text-muted">2,415 followers / 225 tweets</small>
                <a href="#" class="btn btn-sm btn-rounded btn-info m-t-xs"><i class="fa fa-twitter m-t-xs"></i> Follow</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      -->
    </div>
  </div>

@stop


@section('jsFooter')

<script type="text/javascript">
    $( document ).ready(function() {
        
    });
</script>

@stop