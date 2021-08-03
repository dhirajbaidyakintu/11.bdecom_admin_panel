<div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light bg-dark">
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item "> <a class="nav-link nav-toggler  hidden-md-up  waves-effect waves-dark" href="javascript:void(0)"><i class="fas  fa-bars"></i></a></li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fas fa-bars nav-bar-icon"></i></a> </li>
                        <li class="nav-item mt-3 text-white"><strong>ADMIN USER</strong></li>
					</ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item"><a href="{{url('/logout')}}" class="btn btn-sm btn-blue-grey">SIGN OUT</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                        <li> <a href="{{url('/')}}" ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a></li>
                        <li> <a href="{{url('/adminProfile')}}" ><span> <i class="fas fa-user-shield"></i> </span><span class="hide-menu">Profile</span></a></li>
                        <li> <a href="{{url('/visitor')}}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a></li>
                        <li> <a href="{{url('/Slider')}}" ><span> <i class="fas fa-sliders-h"></i> </span><span class="hide-menu">Slider</span></a></li>
                        <li> <a href="{{url('/categoryAndSubCategory')}}" ><span> <i class="fas fa-sitemap"></i> </span><span class="hide-menu">Category</span></a></li>
                        <li> <a href="{{url('/product')}}" ><span> <i class="fas fa-industry"></i> </span><span class="hide-menu">Products</span></a></li>
                        <li> <a href="{{url('/productOrder')}}" ><span> <i class="fab fa-first-order"></i> </span><span class="hide-menu">Product Order</span></a></li>
                        <li> <a href="{{url('/Photo')}}" ><span> <i class="fas fa-image"></i> </span><span class="hide-menu">Photo Gallery</span></a></li>
                        <li> <a href="{{url('/contact')}}" ><span> <i class="fas fa-envelope"></i> </span><span class="hide-menu">Contact</span></a></li>
                        <li> <a href="{{url('/review')}}" ><span> <i class="fas fa-comment"></i> </span><span class="hide-menu">Review</span></a></li>
                    	<li> <a href="{{url('/favourite')}}" ><span> <i class="fas fa-heart"></i> </span><span class="hide-menu">Favourite</span></a></li>
                        <li> <a href="{{url('/productCart')}}" ><span> <i class="fas fa-money-check-alt"></i> </span><span class="hide-menu">Product Cart</span></a></li>
                        <li> <a><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Site Information</span></a>
                            <ul>
                                <li class="nevMenuItem"> <a href="{{url('/AboutUs')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">About Us</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/PrivacyPolicy')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Privacy Policy</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/Purchase')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Purchase</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/Terms')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Terms</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/Address')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Address</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/AboutCompany')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">About Company</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/SocialLink')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Social Link</span></a></li>
                                <li class="nevMenuItem"> <a href="{{url('/DeliveryNotice')}}" ><span class="ml-3"> <i class="fas fa-comments"></i> </span><span class="nevItemText">Delivery Notice</span></a></li>
                            </ul>
                        </li>
                        <li> <a href="{{url('/logout')}}" ><span> <i class="fas fa-sign-out-alt"></i> </span><span class="hide-menu">Sign Out</span></a></li>
					</ul>
                </nav>
            </div>
        </aside>
<div class="page-wrapper">
