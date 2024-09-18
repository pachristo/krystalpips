<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='{{ url('/') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" class="" />
                        <span class="font-bold  text-[#bbbdc0] lg:text-2xl text-xl text-white">rystal Pips</span>
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" class="" />
                        <span class="font-bold text-[#d8d8da] lg:text-2xl text-xl text-white">rystal Pips</span>
                    </span>
                </a>
                <a class='logo logo-dark' href='{{ url('/') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" class="" />
                        <span class="font-bold text-[#c3c5c9] lg:text-2xl text-xl text-white">rystal Pips</span>
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('newf/assets/') }}/icons/krystal.png" alt="" class="" />
                        <span class="font-bold text-[#abacaf] lg:text-2xl text-xl text-white">rystal Pips</span>
                    </span>
                </a>
            </div>
            <style>
               #sidebar-menu>ul>li>a {
    color: #bfbfbf;

}
#sidebar-menu>ul>li>a:hover {
    background: #FCFBFB;
    color: #0B1935
}

#sidebar-menu {
    padding: 0 0px 0px 0px;
}
            </style>


            <ul id="side-menu">


                <li>
                    <div>
                        <p>&nbsp;</p>
                    </div>
                </li>
                <li>
                    <div>
                        <p>&nbsp;</p>
                    </div>
                </li>

                <li>
                    <a class='tp-link' href='{{ url('/') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Home </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ url('signals') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Signals </span>
                    </a>
                </li>

                <li>
                    <a class='tp-link' href='{{ url('mentorship') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Mentorship </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ url('account-management') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Account Management </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ url('investment') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Investment </span>
                    </a>
                </li>
                <!--<li>-->
                <!--    <a class='tp-link' href='{{ url('bot') }}'>-->
                <!--        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;-->
                <!--        <span> Bot </span>-->
                <!--    </a>-->
                <!--</li>-->
                <li>
                    <a class='tp-link' href='{{ url('courses') }}'>
                        <img src="{{ asset('ms.png') }}" width="18">&nbsp;&nbsp;
                        <span> Courses </span>
                    </a>
                </li>






            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
