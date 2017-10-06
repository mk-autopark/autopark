<div class="container-fluid">
    <div class="col-md-3">

        <div id="sidebar">
            {{--TODO all systems seaarch--}}
            {{--<div class="container-fluid tmargin">--}}
            {{--<div class="input-group">--}}
            {{--<input type="text" class="form-control" placeholder="Search..."/>--}}
            {{--<span class="input-group-btn">--}}
            {{--<button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--</div>--}}

            <ul id="menu" class="nav navbar-nav side-bar">
                <li class="side-bar tmargin"><a href="{{ route('app.carpark.index') }}"><span
                                class="fa fa-car">&nbsp;</span> Cars</a></li>
                <li class="side-bar">
                    <a href="{{ route('app.drivers.index') }}"><span><i class="fa fa-id-card-o"
                                                                        aria-hidden="true"></i>&nbsp;</span>
                        Drivers</a></li>
                <li class="side-bar"><a href="{{ route('app.fuel.index') }}"><span class="glyphicon glyphicon-tint">&nbsp;</span>Fuel</a>
                </li>
                <li class="side-bar"><a href="{{ route('app.routes.index') }}"><span
                                class="glyphicon glyphicon-road">&nbsp;</span>Routes</a>
                </li>

                <li class="side-bar"><a href="{{ route('app.users.index') }}"><span
                                class="glyphicon glyphicon-user">&nbsp;</span>Users</a>
                </li>
                <li class="side-bar"><a href="#"><span
                                class="glyphicon glyphicon-signal">&nbsp;</span>Statistics</a>
                </li>

            </ul>
        </div>
    </div>

</div>