	@php
    use App\Models\Permission;
    use App\Models\Business;
        $user = Auth::user();
        $role = Auth::user()->roles;
        $perm_role = Permission::where('role_id', $role->id)->where('name', "role")->first();
        $perm_user = Permission::where('role_id', $role->id)->where('name', "user")->first();
        $perm_business = Permission::where('role_id', $role->id)->where('name', "business")->first();
        $perm_bc = Permission::where('role_id', $role->id)->where('name', "bc")->first();
        $perm_state = Permission::where('role_id', $role->id)->where('name', "state")->first();
        $perm_blog = Permission::where('role_id', $role->id)->where('name', "blog")->first();
        $business_cont = Business::where('user_id', $user->id)->where('status', 1)->count();
        $business_pending_cont = Business::where('user_id', $user->id)->where('status', 0)->count();
        $adminbusiness_cont = Business::where('status', 1)->count();
        $adminbusiness_pending_cont =  Business::where('status', 0)->count();
    @endphp

    <!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Main">
				<li class="active"><a href="{{route('home')}}"><i class="sl sl-icon-settings"></i> Dashboard</a></li>
				@if(Auth::user()->role_id == 1)
                @if ($perm_role->create == 1 || $perm_role->view == 1)
                <li><a><i class="im im-icon-Security-Block"></i>Roles</a>
					<ul>
                        @if ($perm_role->view == 1)
						<li><a href="{{route('role.index')}}">View Roles </a></li>
                        @endif
                        @if ($perm_role->create == 1)
                        <li><a href="{{route('role.add')}}">Add New Role </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif
                @if ($perm_user->create == 1 || $perm_user->view == 1)
                <li><a><i class="im im-icon-Business-Man"></i>Users</a>
					<ul>
                        @if ($perm_user->view == 1)
						<li><a href="{{route('user.index')}}">View Users </a></li>
                        @endif
                        @if ($perm_user->create == 1)
                        <li><a href="{{route('user.add')}}">Add New Users </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif
				@endif

                @if ($perm_bc->create == 1 || $perm_bc->view == 1)
                <li><a><i class="sl sl-icon-layers"></i>Business Category</a>
					<ul>
                        @if ( $perm_bc->view == 1)
						<li><a href="{{route('bc.index')}}">View Business Category</a></li>
                        @endif
                        @if ($perm_bc->create == 1)
						<li><a href="{{route('bc.add')}}">Add Business Category </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif
                @if ($perm_business->create == 1 || $perm_business->view == 1)
                <li><a href="{{route('business.add')}}"><i class="sl sl-icon-plus"></i> Add Business</a></li>
                <li><a><i class="sl sl-icon-handbag"></i>Business</a>
					<ul>
                        @if ( $perm_business->view == 1)
						<li><a href="{{route('business.index')}}">View Active Business
                            @if ($user->role_id == 1)
                                <span class="nav-tag green">{{$adminbusiness_cont}}</span>
                            @else
                            <span class="nav-tag green">{{$business_cont}}</span>
                            @endif

                        </a></li>
                        @endif
                        @if ($perm_business->create == 1)
						<li><a href="{{route('business.index_pending')}}">Pending Business
                            @if ($user->role_id == 1)
                                <span class="nav-tag blue">{{$adminbusiness_pending_cont}}</span>
                            @else
                                <span class="nav-tag blue">{{$business_pending_cont}}</span>
                            @endif

                        </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif
                @if ($perm_state->create == 1 || $perm_state->view == 1)
                <li><a><i class="im im-icon-Map2"></i>States</a>
					<ul>
                        @if ($perm_state->view == 1)
						<li><a href="{{route('state.index')}}">View States</a></li>
                        @endif
                        @if ($perm_state->create == 1)
						<li><a href="{{route('state.add')}}">Add State </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif
                @if ($perm_blog->create == 1 || $perm_blog->view == 1)
                <li><a><i class="im im-icon-File-HorizontalText"></i>Blogs</a>
					<ul>
                        @if ($perm_blog->view == 1)
						<li><a href="{{route('blog.index')}}">View Blog</a></li>
                        @endif
                        @if ($perm_blog->create == 1)
						<li><a href="{{route('blog.add')}}">Add Blog </a></li>
                        @endif
						{{-- <li><a href="dashboard-my-listings.html">Expired <span class="nav-tag red">2</span></a></li> --}}
					</ul>
				</li>
                @endif

			</ul>



			<ul data-submenu-title="Account">
				{{-- <li><a href="dashboard-my-profile.html"><i class="sl sl-icon-user"></i> My Profile</a></li> --}}
                <form  action="{{ route('logout') }}" method="POST">
                    @csrf
				<li>
                    <a role="button" aria-label="submit form" href="javascript:void(0)" onclick="document.querySelector('form').submit()"><i class="sl sl-icon-power"></i> LogOut</a>
                </li>
            </form>
			</ul>

		</div>
	</div>
	<!-- Navigation / End -->
