  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <img src="/dist/img/logo.png" width="100%" alt="AdminLTE Logo" class="brand-image elevation-3">
    <hr>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->username}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if(Auth::user()->role=='user')
          <li class="nav-item">
            <a href="{{route('form')}}" class="nav-link">
              <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.5 7.42053C13.0128 7.42053 11 9.43334 11 11.9205C11 14.4077 13.0128 16.4205 15.5 16.4205C17.9872 16.4205 20 14.4077 20 11.9205C20 9.43334 17.9872 7.42053 15.5 7.42053ZM17.5 12.1171C17.5 12.284 17.3634 12.4205 17.1966 12.4205H15.3038C15.1369 12.4205 15.0003 12.284 15.0003 12.1171V9.72428C15.0003 9.55741 15.1369 9.42085 15.3038 9.42085H15.6966C15.8634 9.42085 16 9.55741 16 9.72428V11.4205H17.1966C17.3634 11.4205 17.5 11.5571 17.5 11.724V12.1171ZM15.5 6.42053C15.6687 6.42053 15.835 6.43084 16 6.44584V4.92053C16 4.12053 15.3 3.42053 14.5 3.42053H12V1.92053C12 1.12053 11.3 0.420532 10.5 0.420532H5.5C4.7 0.420532 4 1.12053 4 1.92053V3.42053H1.5C0.7 3.42053 0 4.12053 0 4.92053V7.42053H12.3475C13.2413 6.79272 14.3272 6.42053 15.5 6.42053ZM10 3.42053H6V2.42053H10V3.42053ZM10.2131 10.4205H6.5C6.22375 10.4205 6 10.1968 6 9.92053V8.42053H0V12.9205C0 13.7205 0.7 14.4205 1.5 14.4205H10.6072C10.2219 13.6693 10 12.8212 10 11.9205C10 11.3999 10.0775 10.898 10.2131 10.4205Z" fill="white"/>
              </svg>&nbsp&nbsp
              <p style="font-size:15px">
                Surat Keterangan Usaha
              </p>
            </a>
          </li>
        @endif
        @if(Auth::user()->role=='user')
          <li class="nav-item">
            <a href="{{route('form-konsultasi')}}" class="nav-link">
              <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 10.4205C20 15.9446 15.5225 20.4205 10 20.4205C4.47754 20.4205 0 15.9446 0 10.4205C0 4.89968 4.47754 0.420532 10 0.420532C15.5225 0.420532 20 4.89968 20 10.4205ZM10.2683 3.72698C8.07089 3.72698 6.66935 4.65267 5.56879 6.29787C5.42621 6.51102 5.47391 6.79848 5.67827 6.95344L7.07742 8.01432C7.2873 8.17348 7.58633 8.13561 7.74939 7.92876C8.46972 7.01513 8.96363 6.48533 10.06 6.48533C10.8837 6.48533 11.9027 7.01549 11.9027 7.81428C11.9027 8.41815 11.4042 8.72827 10.5908 9.18428C9.64226 9.71602 8.3871 10.3778 8.3871 12.0334V12.1947C8.3871 12.4619 8.60375 12.6786 8.87097 12.6786H11.129C11.3962 12.6786 11.6129 12.4619 11.6129 12.1947V12.141C11.6129 10.9933 14.9672 10.9455 14.9672 7.83989C14.9672 5.5011 12.5412 3.72698 10.2683 3.72698ZM10 13.727C8.97722 13.727 8.14516 14.559 8.14516 15.5818C8.14516 16.6046 8.97722 17.4367 10 17.4367C11.0228 17.4367 11.8548 16.6046 11.8548 15.5818C11.8548 14.559 11.0228 13.727 10 13.727Z" fill="#F6F6F6"/>
              </svg>&nbsp&nbsp
              <p style="font-size:15px">
                Konsultasi
              </p>
            </a>
          </li>
        @endif

        @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.5 7.42053C13.0128 7.42053 11 9.43334 11 11.9205C11 14.4077 13.0128 16.4205 15.5 16.4205C17.9872 16.4205 20 14.4077 20 11.9205C20 9.43334 17.9872 7.42053 15.5 7.42053ZM17.5 12.1171C17.5 12.284 17.3634 12.4205 17.1966 12.4205H15.3038C15.1369 12.4205 15.0003 12.284 15.0003 12.1171V9.72428C15.0003 9.55741 15.1369 9.42085 15.3038 9.42085H15.6966C15.8634 9.42085 16 9.55741 16 9.72428V11.4205H17.1966C17.3634 11.4205 17.5 11.5571 17.5 11.724V12.1171ZM15.5 6.42053C15.6687 6.42053 15.835 6.43084 16 6.44584V4.92053C16 4.12053 15.3 3.42053 14.5 3.42053H12V1.92053C12 1.12053 11.3 0.420532 10.5 0.420532H5.5C4.7 0.420532 4 1.12053 4 1.92053V3.42053H1.5C0.7 3.42053 0 4.12053 0 4.92053V7.42053H12.3475C13.2413 6.79272 14.3272 6.42053 15.5 6.42053ZM10 3.42053H6V2.42053H10V3.42053ZM10.2131 10.4205H6.5C6.22375 10.4205 6 10.1968 6 9.92053V8.42053H0V12.9205C0 13.7205 0.7 14.4205 1.5 14.4205H10.6072C10.2219 13.6693 10 12.8212 10 11.9205C10 11.3999 10.0775 10.898 10.2131 10.4205Z" fill="white"/>
            </svg>&nbsp&nbsp
              <p style="font-size:15px">
                Surat Keterangan Usaha
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-pengajuan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-pengajuan-sertifikat')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unggah Sertifikat</p>
                </a>
              </li>
            </ul>
          </li>
          @endif

          @if(Auth::user()->role=='admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 10.4205C20 15.9446 15.5225 20.4205 10 20.4205C4.47754 20.4205 0 15.9446 0 10.4205C0 4.89968 4.47754 0.420532 10 0.420532C15.5225 0.420532 20 4.89968 20 10.4205ZM10.2683 3.72698C8.07089 3.72698 6.66935 4.65267 5.56879 6.29787C5.42621 6.51102 5.47391 6.79848 5.67827 6.95344L7.07742 8.01432C7.2873 8.17348 7.58633 8.13561 7.74939 7.92876C8.46972 7.01513 8.96363 6.48533 10.06 6.48533C10.8837 6.48533 11.9027 7.01549 11.9027 7.81428C11.9027 8.41815 11.4042 8.72827 10.5908 9.18428C9.64226 9.71602 8.3871 10.3778 8.3871 12.0334V12.1947C8.3871 12.4619 8.60375 12.6786 8.87097 12.6786H11.129C11.3962 12.6786 11.6129 12.4619 11.6129 12.1947V12.141C11.6129 10.9933 14.9672 10.9455 14.9672 7.83989C14.9672 5.5011 12.5412 3.72698 10.2683 3.72698ZM10 13.727C8.97722 13.727 8.14516 14.559 8.14516 15.5818C8.14516 16.6046 8.97722 17.4367 10 17.4367C11.0228 17.4367 11.8548 16.6046 11.8548 15.5818C11.8548 14.559 11.0228 13.727 10 13.727Z" fill="#F6F6F6"/>
            </svg>&nbsp&nbsp
              <p style="font-size:15px">
                Konsultasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list-konsultasi')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('list-konsultasi-hari-ini')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Konsultasi Hari Ini</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item">
          <a class="dropdown-item nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <p style="font-size:15px">
                Logout
              </p>
          </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                  <a href="{{ route('logout') }}" class="btn btn-danger"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                  </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
              </div>
            </div>
          </div>