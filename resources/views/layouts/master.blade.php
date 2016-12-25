<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Office Dashboard - Full pack payroll management system</title>
  <meta name="description" content="Responsive, Bootstrap, BS4" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="{{ URL::secure('/') }}/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{ URL::secure('/') }}/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/ionicons/css/ionicons.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/styles/style.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="{{ URL::secure('/') }}/css/styles/font.css" type="text/css" />
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside fade nav-dropdown black">
    <!-- fluid app aside -->
    <div class="navside dk" data-layout="column">
      <div class="navbar no-radius">
        <!-- brand -->
        <a href="/dashboard" class="navbar-brand">
        	<div data-ui-include="'/images/logo.svg'"></div>
        	<img src="/images/logo.png" alt="." class="hide">
        	<span class="hidden-folded inline">aside</span>
        </a>
        <!-- / brand -->
      </div>
      <div data-flex class="hide-scroll">
          <nav class="scroll nav-stacked nav-stacked-rounded nav-color">
            
            <ul class="nav" data-ui-nav>
              <li class="nav-header hidden-folded">
                <span class="text-xs">Main</span>
              </li>
              <li>
                <a href="/dashboard" class="b-danger">
                  <span class="nav-icon text-white no-fade">
                    <i class="ion-filing"></i>
                  </span>
                  <span class="nav-text">Dashboard</span>
                </a>
              </li>
              <li>
                <a href="/payroll" class="b-success">
                  <span class="nav-icon text-white no-fade">
                    <i class="ion-android-apps"></i>
                  </span>
                  <span class="nav-text">Payroll</span>
                </a>
              </li>
              <li>
                <a href="/messaging" class="b-default">
                  <span class="nav-label">
                    <b class="label label-xs rounded danger"></b>
                  </span>
                  <span class="nav-icon">
                    <i class="ion-chatbubble-working"></i>
                  </span>
                  <span class="nav-text">Messaging</span>
                </a>
              </li>
              <li>
                <a href="/contact" class="b-default">
                  <span class="nav-icon">
                    <i class="ion-person"></i>
                  </span>
                  <span class="nav-text">Contacts</span>
                </a>
              </li>
            
              <li class="nav-header hidden-folded m-t">
                <span class="text-xs">Administration</span>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="ion-plus-circled"></i>
                  </span>
                  <span class="nav-text">Employees</span>
                </a>
                <ul class="nav-sub nav-mega nav-mega-3">
                  <li>
                    <a href="/employee" >
                      <span class="nav-text">Employee List</span>
                    </a>
                  </li>
                  <li>
                    <a href="/employee/create" >
                      <span class="nav-text">Add Employee</span>
                    </a>
                  </li>
                </ul>
              </li>
            
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="ion-ios-photos"></i>
                  </span>
                  <span class="nav-text">Users</span>
                </a>
                <ul class="nav-sub nav-mega">
                  <li>
                    <a href="/user" >
                      <span class="nav-text">List</span>
                    </a>
                  </li>
                  <li>
                    <a href="/user/create">
                      <span class="nav-text">Add</span>
                    </a>
                  </li>
                </ul>
              </li>
            
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="ion-ios-grid-view"></i>
                  </span>
                  <span class="nav-text">Miscellaneous</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="/prefix" >
                      <span class="nav-text">Prefix</span>
                    </a>
                  </li>
                  <li>
                    <a href="/rank" >
                      <span class="nav-text">Ranks</span>
                    </a>
                  </li>
                  <li>
                    <a href="/employeelevel" >
                      <span class="nav-text">Employee Level</span>
                    </a>
                  </li>
                  <li>
                    <a href="/paygrade" >
                      <span class="nav-text">Pay Grades</span>
                    </a>
                  </li>
                  <li>
                    <a href="/bank" >
                      <span class="nav-text">Banks</span>
                    </a>
                  </li>
                  <li>
                    <a href="/pension" >
                      <span class="nav-text">Pension</span>
                    </a>
                  </li>
                  <li>
                    <a href="/salarycomponent" >
                      <span class="nav-text">Salary Component</span>
                    </a>
                  </li>
                  <li>
                    <a href="/department" >
                      <span class="nav-text">Departments</span>
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="ion-pie-graph"></i>
                  </span>
                  <span class="nav-text">Settings</span>
                </a>
                <ul class="nav-sub">
                  <li>
                    <a href="chart.html" >
                      <span class="nav-text">Chart</span>
                    </a>
                  </li>
                  <li>
                    <a href="chartjs.html" >
                      <span class="nav-text">Chartjs</span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="nav-caret">
                        <i class="fa fa-caret-down"></i>
                      </span>
                      <span class="nav-text">Echarts</span>
                    </a>
                    <ul class="nav-sub">
                      <li>
                        <a href="echarts-line.html" >
                          <span class="nav-text">line</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-bar.html" >
                          <span class="nav-text">Bar</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-pie.html" >
                          <span class="nav-text">Pie</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-scatter.html" >
                          <span class="nav-text">Scatter</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-radar-chord.html" >
                          <span class="nav-text">Radar &amp; Chord</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-gauge-funnel.html" >
                          <span class="nav-text">Gauges &amp; Funnel</span>
                        </a>
                      </li>
                      <li>
                        <a href="echarts-map.html" >
                          <span class="nav-text">Map</span>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
      </div>
      <div data-flex-no-shrink>
        <div class="nav-fold dropup">
          <a data-toggle="dropdown">
              <div class="pull-left">
                <div class="inline"><span class="avatar w-40 grey">JR</span></div>
                <img src="images/a0.jpg" alt="..." class="w-40 img-circle hide">
              </div>
              <div class="clear hidden-folded p-x">
                <span class="block _500 text-muted">Jean Reyes</span>
                <div class="progress-xxs m-y-sm lt progress">
                    <div class="progress-bar info" style="width: 15%;">
                    </div>
                </div>
              </div>
          </a>
          <div class="dropdown-menu w dropdown-menu-scale ">
            <a class="dropdown-item" href="profile.html">
              <span>Profile</span>
            </a>
            <a class="dropdown-item" href="setting.html">
              <span>Settings</span>
            </a>
            <a class="dropdown-item" href="app.inbox.html">
              <span>Inbox</span>
            </a>
            <a class="dropdown-item" href="app.message.html">
              <span>Message</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="docs.html">
              Need help?
            </a>
            <a class="dropdown-item" href="/login">Sign out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- / -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Payroll Management System</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link" data-toggle="dropdown">
                      <i class="ion-android-search w-24"></i>
                    </a>
                    <div class="dropdown-menu text-color w-md animated fadeInUp pull-right">
                      <!-- search form -->
                      <form class="navbar-form form-inline navbar-item m-a-0 p-x v-m" role="search">
                        <div class="form-group l-h m-a-0">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search projects...">
                            <span class="input-group-btn">
                              <button type="submit" class="btn white b-a no-shadow"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        </div>
                      </form>
                      <!-- / search form -->
                    </div>
                  </li>
                  <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <i class="ion-android-notifications-none w-24"></i>
                      <span class="label up p-a-0 danger"></span>
                    </a>
                    <!-- dropdown -->
                    <div class="dropdown-menu pull-right w-xl animated fadeIn no-bg no-border no-shadow">
                        <div class="scrollable" style="max-height: 220px">
                          <ul class="list-group list-group-gap m-a-0">
                            <li class="list-group-item dark-white box-shadow-z0 b">
                              <span class="pull-left m-r">
                                <img src="/images/a0.jpg" alt="..." class="w-40 img-circle">
                              </span>
                              <span class="clear block">
                                Use awesome <a href="#" class="text-primary">animate.css</a><br>
                                <small class="text-muted">10 minutes ago</small>
                              </span>
                            </li>
                            <li class="list-group-item dark-white box-shadow-z0 b">
                              <span class="pull-left m-r">
                                <img src="/images/a1.jpg" alt="..." class="w-40 img-circle">
                              </span>
                              <span class="clear block">
                                <a href="#" class="text-primary">Joe</a> Added you as friend<br>
                                <small class="text-muted">2 hours ago</small>
                              </span>
                            </li>
                            <li class="list-group-item dark-white text-color box-shadow-z0 b">
                              <span class="pull-left m-r">
                                <img src="/images/a2.jpg" alt="..." class="w-40 img-circle">
                              </span>
                              <span class="clear block">
                                <a href="#" class="text-primary">Danie</a> sent you a message<br>
                                <small class="text-muted">1 day ago</small>
                              </span>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <!-- / dropdown -->
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="/images/a3.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                      <a class="dropdown-item" href="profile.html">
                        <span>Profile</span>
                      </a>
                      <a class="dropdown-item" href="setting.html">
                        <span>Settings</span>
                      </a>
                      <a class="dropdown-item" href="app.inbox.html">
                        <span>Inbox</span>
                      </a>
                      <a class="dropdown-item" href="app.message.html">
                        <span>Message</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="docs.html">
                        Need help?
                      </a>
                      <a class="dropdown-item" href="/logout">Sign out</a>
                    </div>
                  </li>
                </ul>
                <!-- / navbar right -->
          </div>
    </div>
    <div class="app-footer white bg p-a b-t">
      <div class="pull-right text-sm text-muted">Version 1.0.1</div>
      <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

<!-- ############ PAGE START-->
<!-- only need a height for layout 4 -->
<div style="min-height: 200px">
    @yield('content')
</div>

<!-- ############ PAGE END-->

    </div>
  </div>
  <!-- / -->

  
  <!-- ############ SWITHCHER START-->
    <div id="switcher">
      <div class="switcher dark-white" id="sw-theme">
        <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="dark-white sw-btn">
          <i class="fa fa-gear text-muted"></i>
        </a>
        <div class="box-header">
          <!--<a href="#" class="btn btn-xs rounded danger pull-right">BUY</a>-->
          <strong>Theme Switcher</strong>
        </div>
        <div class="box-divider"></div>
        <div class="box-body">
          <p id="settingLayout" class="hidden-md-down">
            <label class="md-check m-y-xs" data-target="folded">
              <input type="checkbox">
              <i></i>
              <span>Adjust Workspace</span>
            </label>
            <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">
              <span class="fa fa-expand fa-fw m-r-xs"></span>
              <span>Fullscreen Mode</span>
            </label>
          </p>
          <p>Colors:</p>
          <p data-target="color">
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="primary">
              <i class="primary"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="accent">
              <i class="accent"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warn">
              <i class="warn"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="success">
              <i class="success"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="info">
              <i class="info"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="warning">
              <i class="warning"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">
              <input type="radio" name="color" value="danger">
              <i class="danger"></i>
            </label>
          </p>
          <p>Themes:</p>
          <div data-target="bg" class="clearfix">
            <label class="radio radio-inline m-a-0 ui-check ui-check-lg">
              <input type="radio" name="theme" value="">
              <i class="light"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="grey">
              <i class="grey"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="dark">
              <i class="dark"></i>
            </label>
            <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-lg">
              <input type="radio" name="theme" value="black">
              <i class="black"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  <!-- ############ SWITHCHER END-->

<!-- ############ LAYOUT END-->
  </div>

<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="{{ URL::secure('/') }}/libs/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="{{ URL::secure('/') }}/libs/tether/dist/js/tether.min.js"></script>
  <script src="{{ URL::secure('/') }}/libs/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="{{ URL::secure('/') }}/libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="{{ URL::secure('/') }}/libs/PACE/pace.min.js"></script>
  <script src="{{ URL::secure('/') }}/libs/jquery-pjax/jquery.pjax.js"></script>
  <script src="{{ URL::secure('/') }}/libs/blockUI/jquery.blockUI.js"></script>
  <script src="{{ URL::secure('/') }}/libs/jscroll/jquery.jscroll.min.js"></script>

  <script src="{{ URL::secure('/') }}/scripts/config.lazyload.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-load.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-jp.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-include.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-device.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-form.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-modal.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-nav.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-list.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-screenfull.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-scroll-to.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-toggle-class.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ui-taburl.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/app.js"></script>
  <script src="{{ URL::secure('/') }}/scripts/ajax.js"></script>
<!-- endbuild -->

<!--<script src="{{ URL::to('/') }}/scripts/ui-taburl.js"></script>-->

@yield('jsFooter')
</body>
</html>
