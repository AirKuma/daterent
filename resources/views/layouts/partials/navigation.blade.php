<div class="container">
            <nav class="navbar navbar-light bg-faded navbar-fixed-top">
              <div class="navbar-header">
             <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
               &#9776;
             </button>
          <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
            <a class="navbar-brand" href="/"><b>DateRent</b></a>                    
            <ul class="nav navbar-nav pull-xs-right">

              <li class="nav-item">
                <a onmouseover="this.style.color='#F9E5E5'" onMouseOut="this.style.color='#FFF'" class="nav-link" href="{{ route('rent.index',['sort' => 'new']) }}">找情人</a>           
              </li>
              <li class="nav-item">
                <a onmouseover="this.style.color='#F9E5E5'" onMouseOut="this.style.color='#FFF'" class="nav-link" href="{{ route('contactus') }}">聯絡我們</a>           
              </li>
                @if(!Auth::check())
              <li class="nav-item"> <a onmouseover="this.style.color='#F9E5E5'" onMouseOut="this.style.color='#FFF'" class="nav-link" href="/auth/login">登入/註冊</a>      </li>
              @else
<li class="nav-item dropdown">
    <a onmouseover="this.style.color='#F9E5E5'" onMouseOut="this.style.color='#FFF'" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <img style="height:30px;width:30px;" src="{{ $avator_url }}"  class="img-rounded special-img">
          {{ Auth::user()->name }}<b class="caret"></b>
        </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('user.show', Auth::id()) }}"><i class="fa fa-cog"></i>個人空間</a></li>
                    @if($myprofiledata->permissions == 1)
                    <li><a class="dropdown-item" href="{{ route('admin.user') }}"><i class="fa fa-cog"></i>管理平台</a></li>
                    @endif
                    <li><a class="dropdown-item"href="/auth/logout"><i class="fa fa-sign-out"></i>登出</a></li>
                </ul>
</li>
@endif
            </ul>
         </div>   
      </nav>

   </div>