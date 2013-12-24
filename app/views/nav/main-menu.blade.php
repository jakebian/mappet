	<ul class="title-area large-3">
	    <!-- Title Area -->
	    <li class="name">
	     <div class="logo">{{link_to('/',"Samphire")}}</div> 
	     	
	        
	    </li>
	    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
	    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
 	 </ul>
 <section class="top-bar-section">
	 <ul class="right">
		
		 @if(!Sentry::check())
	        <li>{{ link_to("/user/register", "Register",array('class'=>'lr_button')) }}</li>
	        <li>{{ link_to("/user/login", "Login",array('class'=>'lr_button')) }}</li>
	        @else
	        <?php $user=Sentry::getUser(); ?>
	        <li class="">
	        	<a href="#" class="lr_button"data-dropdown="user-subnav">{{$user->alias}}</a>
	        	<ul id="user-subnav" class="f-dropdown">
	        		<li>{{link_to($user->id,'my profile')}}</li>
	        		<li>{{ link_to("/user/logout", "Logout") }}</li>
	        	</ul>

	        </li>
	       <li> {{ link_to("/learnlist/create", "New Learnlist",array('class'=>'lr_button')) }}</li>

	        @endif
	</ul>
</section>

