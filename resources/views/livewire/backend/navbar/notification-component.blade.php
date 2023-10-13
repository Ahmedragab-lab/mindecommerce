<div>
    <li class="dropdown dropdown-notification nav-item">
        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
            <i class="ficon ft-bell"></i>
            <span class="badge badge-pill badge-danger badge-up badge-glow">{{ $unreadNotificationsCount }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
            <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                </h6>
                <span class="notification-tag badge badge-danger float-right m-0">5 New</span>
            </li>
            <li class="scrollable-container media-list w-100">
                @forelse($unreadNotifications as $notification)
                <a wire:click='markAsRead("{{ $notification->id }}")'>
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan mr-0"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading">{{ $notification->data['user'] }}</h6>
                            <p class="notification-text font-small-3 text-muted">{{ $notification->data['message'] }}</p>
                            <small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{ $notification->data['created_at'] }}</time>
                            </small>
                        </div>
                    </div>
                </a>
                @empty
                    <a href="#" class="media">
                        <div class="media-body">
                            <h6 class="media-heading">No Notifications</h6>
                        </div>
                    </a>
                @endforelse

                {{-- <a href="javascript:void(0)">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1 mr-0"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading red darken-1">99% Server load</h6>
                            <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time></small>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3 mr-0"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                            <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan mr-0"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading">Complete the task</h6><small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                        </div>
                    </div>
                </a>
                <a href="javascript:void(0)">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal mr-0"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading">Generate monthly report</h6><small>
                                <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                        </div>
                    </div>
                </a> --}}
            </li>
            <li class="dropdown-menu-footer">
                <a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a>
            </li>
        </ul>
    </li>
</div>
