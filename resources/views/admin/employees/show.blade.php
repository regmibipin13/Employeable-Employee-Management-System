@extends('layouts.admin')
@section('content')
<h6 class="c-grey-900">
    {{ trans('cruds.employee.title_singular') }} {{ trans('global.list') }}
</h6>

<div class="mT-30">
<div class="row">
        <div class="col-xs-12 col-sm-9">

          <!-- User profile -->
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="profile__avatar">
              <img src="{{ $employee->user->getFirstMediaUrl('user_photo') ?? 'https://civilcapitalmarket.com/frontend/web/assets/images/default-user.png' }}" alt="{{ $employee->name }}">
              </div>
              <div class="profile__header">
                <h4>{{ $employee->name }}

                </h4>
                <p class="text-muted mt-0 pt-0">
                    {{ $employee->bio }}
                </p>
              </div>
            </div>
          </div>
          <br />
          <br />
          <br />
          <!-- User info -->
          <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">User info</h4>
            </div>
            <div class="panel-body">
              <table class="table profile__table">
                <tbody>
                  <tr>
                    <th><strong>Location</strong></th>
                    <td>{{ $employee->address }}</td>
                  </tr>
                  <tr>
                    <th><strong>Working Since</strong></th>
                  <td>{{ $employee->started_from }}</td>
                  </tr>
                  <tr>
                    <th><strong>Designation</strong></th>
                    <td>{{ $employee->designation->name }}</td>
                  </tr>
                  <tr>
                    <th><strong>Department</strong></th>
                  <td> {{ $employee->department->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- Community -->
          <div class="panel panel-default">
            <div class="panel-heading">
            <h4 class="panel-title">Achievements and Experince</h4>
            </div>
            <div class="panel-body">
              <table class="table profile__table">
                <tbody>
                  <tr>
                    <th><strong>Acedamic Qualification</strong></th>
                  <td>{{ $employee->acadamic_qualification }}</td>
                  </tr>
                  <tr>
                    <th><strong>Last login</strong></th>
                    <td>{{ $employee->user->last_login_at !== null ? $employee->user->last_login_at .' UTC' : 'Not logged in yet' }}</td>
                  </tr>
                  <tr>
                    <th><strong>Last login IP</strong></th>
                    <td>{{ $employee->user->last_login_ip }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
        <div class="col-xs-12 col-sm-3">

          <!-- Contact user -->
          <employee-instant-actions :employee="{{ $employee }}" inline-template>
            <div class="d-flex">
              <form @submit.prevent="statusChange" class="p-0 m-0">
                <button class="profile__contact-btn btn btn-sm" :class="status ? 'btn-danger' : 'btn-success'" onclick="confirm('Are you sure you want to kick this employee out of the system ?')">
                  @{{ status ? 'Disable' : 'Enable' }}
                </button>
              </form>
              &nbsp;
              <a href="#" class="profile__contact-btn btn btn-sm btn-secondary" data-toggle="modal" data-target="#instant-mail">
                Instant Mail
              </a>
              @include('admin.employees.partials.message_box')
            </div>
          </employee-instant-actions>

          <hr class="profile__contact-hr">

          <!-- Contact info -->
          <div class="profile__contact-info">
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">Work number</h5>
                (000)987-65-43
              </div>
            </div>
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fas fa-phone"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">Mobile number</h5>
                {{ $employee->phone }}
              </div>
            </div>
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fas fa-envelope-square"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">E-mail address</h5>
                <a href="mailto:admin@domain.com">{{ $employee->email }}</a>
              </div>
            </div>
            <div class="profile__contact-info-item">
              <div class="profile__contact-info-icon">
                <i class="fas fa-map-marker"></i>
              </div>
              <div class="profile__contact-info-body">
                <h5 class="profile__contact-info-heading">Work address</h5>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              </div>
            </div>
          </div>

        </div>
    </div>
</div>
@endsection