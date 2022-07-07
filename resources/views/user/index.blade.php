<x-master-layout>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>User table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Users</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Balance</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if($user->profile->imgPath=="")
                                                    <img src="{{asset('storage/users/image-default.jpg')}}" class="avatar avatar-sm me-3" alt="user1">
                                                @else
                                                    <img src="{{asset('storage/'.$user->profile->imgPath)}}" class="avatar avatar-sm me-3" alt="user1">
                                                @endif
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$user->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$user->role()}}</p>
                                        <p class="text-xs text-secondary mb-0">{{$user->profile->phoneNumber}}</p>
                                    </td>
                                    @if($user->role_id==3 ||$user->role_id==4)
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$user->wallet->balance}} MMK</p>
                                    </td>
                                    @endif
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm {{$user->status==1 ? 'bg-gradient-success':'bg-gradient-danger' }}">{{$user->status==1 ? 'Active':'Baned' }}</span>
                                    </td>
                                    <td class="align-middle text-center">

                                        @if($user->status==1)
                                            <a href="{{route('users.ban',$user)}}" class="text-decoration-none"><i class="feather-delete text-danger fa-2x"></i></a>
                                        @else
                                        <a href="{{route('users.unBan',$user)}}" class="text-decoration-none"><i class="feather-delete text-success fa-2x"></i></a>
                                        @endif

                                        @if($user->role_id==3 ||$user->role_id==4)
                                            <a href="{{route('getDeposit',$user)}}" class="text-decoration-none"><i class="feather-plus-circle text-primary fa-2x"></i></a>
                                            <a href="{{route('getWithdraw',$user)}}" class="text-decoration-none"><i class="feather-minus-circle text-primary fa-2x"></i></a>
                                        @endif
                                        <a href="{{route('user.edit',$user)}}" class="text-decoration-none"><i class="feather-edit text-primary fa-2x"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
