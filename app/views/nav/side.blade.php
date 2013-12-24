<ul>

@if (Sentry::check())
   <?php $user=Sentry::getUser(); ?>
   <li class="slide-nav-item"> {{ link_to("/user/logout", "sign out") }}</li>
@endif

<li class="slide-nav-item corp-logo"><h1>MAPP</h1> </li>
@if(!isset($user))
	<li class="slide-nav-item"> <a href="/user/register">register</a> </li>
	<li class="slide-nav-item"> <a href="/user/login">sign in</a> </li>
@else



@endif
<li class="slide-nav-item"> <a href="/">about</a> </li>
</ul>