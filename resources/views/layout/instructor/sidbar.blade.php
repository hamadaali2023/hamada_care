    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- <li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">الرئيسية</span></a>
          <ul class="menu-content">            
            <li  class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> 
                <a class="menu-item" href="{{url('admin/dashboard')}}" data-i18n="nav.flot_charts.flot_pie_charts">الرئيسية</a>
            </li>
          </ul>
        </li> -->
       
      
        <li class="nav-item {{ Request::is('instructor/dashboard') ? 'active' : '' }}">
            <a href="{{url('instructor/dashboard')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">الرئيسية</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/profile') ? 'active' : '' }}">
            <a href="{{url('instructor/profile')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">حسابي</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/bankdetails') ? 'active' : '' }}">
            <a href="{{url('instructor/bankdetails')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">معلومات البنك</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/stories') ? 'active' : '' }}">
            <a href="{{url('instructor/stories')}}">
                <i class="la la-envelope"></i>
                <span class="menu-title" data-i18n="">الكتب</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('instructor/terms/conditions') ? 'active' : '' }}">
            <a href="{{url('instructor/terms/conditions')}}">
                <i class="la la-envelope"></i>
                <span class="menu-title" data-i18n="">إتفاقية المؤلف</span>
            </a>
        </li>


        <!--<li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">الكورسات</span></a>-->
        <!--  <ul class="menu-content">-->
        <!--    <li  class="{{ Request::is('instructor/courses') ? 'active' : '' }}"> -->
        <!--        <a class="menu-item" href="{{ url('instructor/courses') }}" data-i18n="nav.flot_charts.flot_line_charts">الكورسات</a>-->
        <!--    </li>-->
        <!--    <li  class="{{ Request::is('instructor/chapters') ? 'active' : '' }}"> -->
        <!--        <a class="menu-item" href="{{url('instructor/chapters')}}" data-i18n="nav.flot_charts.flot_line_charts">الشباتر</a>-->
        <!--    </li>-->
        <!--    <li  class="{{ Request::is('instructor/videos') ? 'active' : '' }}"> -->
        <!--        <a class="menu-item" href="{{url('instructor/videos')}}" data-i18n="nav.flot_charts.flot_bar_charts">الفيديوهات</a>-->
        <!--    </li>-->
            
        <!--  </ul>-->
        <!--</li>-->

        <!--<li class="nav-item {{ Request::is('instructor/report/sales') ? 'active' : '' }}">-->
        <!--    <a href="{{url('instructor/report/sales')}}">-->
        <!--        <i class="la la-envelope"></i>-->
        <!--        <span class="menu-title" data-i18n="">تقرير المبيعات</span>-->
        <!--    </a>-->
        <!--</li>-->
        <!-- <li class="nav-item {{ Request::is('instructor/report/transfers') ? 'active' : '' }}">-->
        <!--    <a href="{{url('instructor/report/transfers')}}">-->
        <!--        <i class="la la-envelope"></i>-->
        <!--        <span class="menu-title" data-i18n="">تقرير التحويلات</span>-->
        <!--    </a>-->
        <!--</li>-->
        <!-- <li class="nav-item {{ Request::is('instructor/report/statistics') ? 'active' : '' }}">-->
        <!--    <a href="{{url('instructor/report/statistics')}}">-->
        <!--        <i class="la la-envelope"></i>-->
        <!--        <span class="menu-title" data-i18n="">الإحصائيات</span>-->
        <!--    </a>-->
        <!--</li>-->
        
        


       
        
        
      </ul>
    </div>
  </div>