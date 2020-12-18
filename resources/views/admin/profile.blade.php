@extends('layouts.admin')
@section('content')
<div class="row mT-30 flex-lg-nowrap">
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card p-10">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">   
                     @if(auth()->user()->hasRole('title','Employee'))
                     <img src="{{ auth()->user()->employee->getFirstMediaUrl('employee_photo') }}" width="200" height="200">
                     @else
                     <img src="{{ auth()->user()->getFirstMediaUrl('user_photo') }}" width="200" height="200">
                     @endif
                    </div>
                  </div>
                </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ auth()->user()->name }}</h4>
                    <div class="text-muted"><small>Last Login IP: {{ auth()->user()->last_login_ip }}</small></div>
                  </div>
                  <div class="text-center text-sm-right">
                    @foreach(auth()->user()->roles as $role)
                    <span class="badge badge-secondary">{{ $role->title }}</span>
                    @endforeach
                    <div class="text-muted"><small>Joined {{ auth()->user()->created_at->format('Y-m-d') }}</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form" action="{{ route('admin.update_profile',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input class="form-control" type="text" name="name" placeholder="John Smith" value="{{ auth()->user()->name }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Email</label>
                              <input class="form-control" value="{{ auth()->user()->email }}" type="email" name="email">
                            </div>
                          </div>
                        </div>
                        @if(auth()->user()->hasRole('title','Employee'))
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Address</label>
                              <input class="form-control" type="text" value="{{ auth()->user()->employee->address }}" name="address">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label>Phone</label>
                              <input class="form-control" type="text" value="{{ auth()->user()->employee->phone }}" name="phone">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label>Academic Qualification</label>
                              <input class="form-control" type="text" name="academic_qualification" value="{{ auth()->user()->employee->academic_qualification }}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>About</label>
                              <textarea class="form-control" rows="5" name="bio" placeholder="My Bio">{{ auth()->user()->employee->bio }}</textarea>
                            </div>
                          </div>
                        </div>
                        @endif
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label>Picture</label>
                              <input type="file" name="photo" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-3 mb-3">
        <div class="card mb-3">
          <div class="card-body">
            <div class="px-xl-3">
              <a href="#"class="btn btn-block btn-secondary"onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="fas fa-sign-out"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection