@extends('profile.layouts.main')
@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="profile-page tx-13">
            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="profile-header border-top-0 shadow">
                        <div class="cover">
                            <div class="gray-shade"></div>
                            <div class="cover-image">
                                <img src="{{ $user->coverImg ? asset($user->coverImg) : $user->defaultcoverImg() }}"
                                    alt="">
                            </div>
                            <div class="cover-body d-flex justify-content-between align-items-center">
                                <div>
                                    <img class="profile-pic"
                                        src="{{ $user->avatar ? asset($user->avatar) : $user->defaultAvatar() }}">
                                    <span class="profile-name">{{ $user->name }}</span>
                                </div>
                                <div class="d-none d-md-block">
                                    @if ($user->id !== Auth::id())
                                        @switch($user->friendStatus)
                                            @case('friends')
                                                <div class="dropdown wa">
                                                    <a class="btn btn-info dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Bạn bè <i class="bi bi-people-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('deleteFriend', $user->id) }}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn ">Xóa bạn <i
                                                                        class="bi bi-person-fill-x"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @break

                                            @case('sent')
                                                {{-- <button type="button" class="btn btn-outline-secondary">Đã gửi yêu cầu <i
                                                class="bi bi-person-fill-up"></i></button> --}}
                                                <div class="dropdown wa">
                                                    <a class="btn btn-secondary dropdown-toggle" href="#"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Đã gửi<i class="bi bi-person-fill-up"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <form action="{{ route('cancelFriendRequest', $user->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="btn ">Hủy yêu cầu <i
                                                                        class="bi bi-person-fill-x"></i></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @break

                                            @case('received')
                                                <div class="d-flex flex-row-reverse">

                                                    <form action="{{ route('denyFriend', $user->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger">Từ chối</button>
                                                    </form>
                                                    <form action="{{ route('acceptFriend', $user->id) }}" method="post"
                                                        class="px-4">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-success">Chấp nhận</button>
                                                    </form>
                                                </div>
                                            @break

                                            @default
                                                <form action="{{ route('addFriend', $user->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-primary">Thêm bạn bè<i
                                                            class="bi bi-person-fill-add"></i></button>
                                                </form>
                                        @endswitch
                                    @else
                                        <a href="{{ route('profile.update', Auth::user()->id) }}"
                                            class="btn btn-primary btn-icon-text btn-edit-profile">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit btn-icon-prepend">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg> Edit profile
                                        </a>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="header-links ">
                            <ul class="links d-flex align-items-center mt-3 mt-md-0 py-4">
                                <li class="header-link-item d-flex align-items-center active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-columns mr-1 icon-md">
                                        <path
                                            d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18">
                                        </path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Bài viết</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user mr-1 icon-md">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Giới thiệu</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-users mr-1 icon-md">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Bạn bè </a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-image mr-1 icon-md">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                        </rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Ảnh</a>
                                </li>
                                <li class="header-link-item ml-3 pl-3 border-left d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-video mr-1 icon-md">
                                        <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                        <rect x="1" y="5" width="15" height="14" rx="2" ry="2">
                                        </rect>
                                    </svg>
                                    <a class="pt-1px d-none d-md-block" href="#">Videos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="parent pt-3 pb-5">
                <div class="container row profile-body">
                    <!-- left wrapper start -->
                    <div class="d-none d-md-block col-md-4 left-wrapper">
                        <div class="card border-top-0 rounded shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="card-title mb-0">Giới thiệu</h6>
                                </div>
                                <p>{!! $user->description !!}</p>
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Joined:</label>
                                    <p class="text-muted">November 15, 2015</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Address:</label>
                                    <p class="text-muted">{{ $user->address }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Email:</label>
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="mt-3">
                                    <label class="tx-11 font-weight-bold mb-0 text-uppercase">Phone:</label>
                                    <p class="text-muted">{{ $user->phone }}</p>
                                </div>
                                <div class="mt-3 d-flex social-links">
                                    <a href="javascript:;"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon github">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"
                                            data-toggle="tooltip" title=""
                                            data-original-title="github.com/nobleui">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="javascript:;"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter" data-toggle="tooltip" title=""
                                            data-original-title="twitter.com/nobleui">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="javascript:;"
                                        class="btn d-flex align-items-center justify-content-center border mr-2 btn-icon instagram">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram" data-toggle="tooltip" title=""
                                            data-original-title="instagram.com/nobleui">
                                            <rect x="2" y="2" width="20" height="20" rx="5"
                                                ry="5">
                                            </rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin mt-4">
                            <div class="card border-top-0 rounded shadow">
                                <div class="card-body">
                                    <h6 class="card-title">latest photos</h6>
                                    <div class="latest-photos">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid"
                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- left wrapper end -->
                    <!-- middle wrapper start -->
                    <div class="col-md-8  middle-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="px-3 border border-top-0 rounded bg-body-tertiary shadow">
                                    <h3>Đăng bài</h3>
                                    <form action="{{ route('createPost') }}" method="POST" class="py-4">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea name="body" class="form-control" rows="3"
                                                placeholder="{{ $user->id != Auth::user()->id ? 'đăng gì đó cho ' . $user->name : 'đăng bài' }}"></textarea>
                                        </div>
                                        @if ($user->id != Auth::user()->id)
                                            <input type="hidden" name="parent_id" value="{{ $user->id }}">
                                        @endif
                                        <button type="submit" class="btn btn-primary">Đăng bài</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="posts">
                                    @include('layouts.posts', ['posts' => $posts])
                                </div>
                                <div id="loading" class="text-center my-3 d-flex justify-content-center" style="display: none;">
                                    <div class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div><div class="spinner-grow" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card border-top-0 rounded shadow">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex ">
                                                <img class="img-xs rounded-circle mt-1"
                                                    src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                    alt="">
                                                <div class="ml-2 ps-2">
                                                    <div class="pt-2">
                                                        <h6 class="">Mike Popescu</h6>
                                                        <p class="tx-11 text-muted m-0">1 min ago</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="dropdownMenuButton2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal icon-lg pb-3px">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-meh icon-sm mr-2">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="8" y1="15" x2="16"
                                                                y2="15"></line>
                                                            <line x1="9" y1="9" x2="9.01"
                                                                y2="9"></line>
                                                            <line x1="15" y1="9" x2="15.01"
                                                                y2="9"></line>
                                                        </svg> <span class="">Unfollow</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-corner-right-up icon-sm mr-2">
                                                            <polyline points="10 9 15 4 20 9"></polyline>
                                                            <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
                                                        </svg> <span class="">Go to post</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-share-2 icon-sm mr-2">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42"
                                                                y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59"
                                                                y2="10.49"></line>
                                                        </svg> <span class="">Share</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-copy icon-sm mr-2">
                                                            <rect x="9" y="9" width="13" height="13"
                                                                rx="2" ry="2"></rect>
                                                            <path
                                                                d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                                            </path>
                                                        </svg> <span class="">Copy link</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Accusamus minima delectus nemo unde quae recusandae assumenda.</p>
                                        <img class="img-fluid" src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                            alt="">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions">
                                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-heart icon-md">
                                                    <path
                                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                    </path>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Like</p>
                                            </a>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-message-square icon-md">
                                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                    </path>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Comment</p>
                                            </a>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-share icon-md">
                                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                    <polyline points="16 6 12 2 8 6"></polyline>
                                                    <line x1="12" y1="2" x2="12" y2="15">
                                                    </line>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Share</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <img class="img-xs rounded-circle"
                                                    src="https://bootdey.com/img/Content/avatar/avatar6.png"
                                                    alt="">
                                                <div class="ml-2">
                                                    <p>Mike Popescu</p>
                                                    <p class="tx-11 text-muted">5 min ago</p>
                                                </div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn p-0" type="button" id="dropdownMenuButton3"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal icon-lg pb-3px">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-meh icon-sm mr-2">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="8" y1="15" x2="16"
                                                                y2="15"></line>
                                                            <line x1="9" y1="9" x2="9.01"
                                                                y2="9"></line>
                                                            <line x1="15" y1="9" x2="15.01"
                                                                y2="9"></line>
                                                        </svg> <span class="">Unfollow</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-corner-right-up icon-sm mr-2">
                                                            <polyline points="10 9 15 4 20 9"></polyline>
                                                            <path d="M4 20h7a4 4 0 0 0 4-4V4"></path>
                                                        </svg> <span class="">Go to post</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-share-2 icon-sm mr-2">
                                                            <circle cx="18" cy="5" r="3"></circle>
                                                            <circle cx="6" cy="12" r="3"></circle>
                                                            <circle cx="18" cy="19" r="3"></circle>
                                                            <line x1="8.59" y1="13.51" x2="15.42"
                                                                y2="17.49"></line>
                                                            <line x1="15.41" y1="6.51" x2="8.59"
                                                                y2="10.49"></line>
                                                        </svg> <span class="">Share</span></a>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-copy icon-sm mr-2">
                                                            <rect x="9" y="9" width="13" height="13"
                                                                rx="2" ry="2"></rect>
                                                            <path
                                                                d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1">
                                                            </path>
                                                        </svg> <span class="">Copy link</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="mb-3 tx-14">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        <img class="img-fluid" src="../../../assets/images/sample2.jpg" alt="">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex post-actions">
                                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-heart icon-md">
                                                    <path
                                                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                                    </path>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Like</p>
                                            </a>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-message-square icon-md">
                                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z">
                                                    </path>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Comment</p>
                                            </a>
                                            <a href="javascript:;" class="d-flex align-items-center text-muted">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-share icon-md">
                                                    <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"></path>
                                                    <polyline points="16 6 12 2 8 6"></polyline>
                                                    <line x1="12" y1="2" x2="12" y2="15">
                                                    </line>
                                                </svg>
                                                <p class="d-none d-md-block ml-2">Share</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- middle wrapper end -->
                    <!-- right wrapper start -->
                    {{-- <div class="d-none d-xl-block col-xl-3 right-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">latest photos</h6>
                                    <div class="latest-photos">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <figure>
                                                    <img class="img-fluid"
                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                                        alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 grid-margin">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h6 class="card-title">suggestions for you</h6>
                                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                        <div class="d-flex align-items-center hover-pointer">
                                            <img class="img-xs rounded-circle"
                                                src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                            <div class="ml-2">
                                                <p>Mike Popescu</p>
                                                <p class="tx-11 text-muted">12 Mutual Friends</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user-plus" data-toggle="tooltip" title=""
                                                data-original-title="Connect">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="8.5" cy="7" r="4"></circle>
                                                <line x1="20" y1="8" x2="20" y2="14">
                                                </line>
                                                <line x1="23" y1="11" x2="17" y2="11">
                                                </line>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <!-- right wrapper end -->
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function handleLike(button, url) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.liked) {
                            button.removeClass('text-dark').addClass('text-primary');
                        } else {
                            button.removeClass('text-primary').addClass('text-dark');
                        }
                        button.html(response.likes_count + ' <i class="bi bi-hand-thumbs-up"></i> ' + (
                            button.hasClass('like-comment-btn') ? 'Like' : 'Like'));
                    }
                });
            }

            // Like button for posts
            $('.like-btn').on('click', function() {
                var button = $(this);
                var postId = button.data('post-id');
                var url = '/post/' + postId + '/like';
                handleLike(button, url);
            });

            // Like button for comments
            $('.like-comment-btn').on('click', function() {
                var button = $(this);
                var commentId = button.data('comment-id');
                var url = '/post/comment/' + commentId + '/like';
                handleLike(button, url);
            });
            $('.edit-comment').on('click', function() {
                var commentId = $(this).data('comment-id');
                var commentSection = $('#comment-' + commentId);

                commentSection.find('.comment-body').prop('disabled', false);
                commentSection.find('.submit-comment').removeClass('d-none');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var page = 1;

            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                    page++;
                    loadMoreData(page);
                }
            });

            function loadMoreData(page) {
                $.ajax({
                        url: '{{ route('home.load_more_posts') }}?page=' + page,
                        type: 'get',
                        beforeSend: function() {
                            $('#loading').show();
                        }
                    })
                    .done(function(data) {
                        if (data.trim().length == 0) {
                            $('#loading').html('No more records found');
                            return;
                        }
                        $('#loading').hide();
                        $('#posts').append(data);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('Something went wrong.');
                    });
            }
        });
    </script>
@endsection