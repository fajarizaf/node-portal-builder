<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Landingi</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li class='@if(Request::segment(2) =='') active @endif'>
            <a href="{{ URL('/') }}">
                <i class='bx bx-home-smile'></i>

                <span class="links_name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        <li class='@if(Request::segment(2) =="store") active @endif'>
            <a href="{{ URL('/manage/store') }}">
                <i class='bx bx-store'></i>
                <span class="links_name">Toko</span>
            </a>
            <span class="tooltip">Toko</span>
        </li>
        <li class='@if(Request::segment(2) =="product") active @endif'>
            <a href="{{ URL('/manage/product') }}">
                <i class='bx bx-package'></i>

                <span class="links_name">Produk</span>
            </a>
            <span class="tooltip">Produk</span>
        </li>
        <li class='@if(Request::segment(2) =="order") active @endif'>
            <a href="{{ URL('/manage/order') }}">
                <i class='bx bx-basket'></i>
                <span class="links_name">Order</span>
            </a>
            <span class="tooltip">Order</span>
        </li>
        <li class='@if(Request::segment(2) =="transaksi") active @endif'>
            <a href="{{ URL('/manage/transaksi') }}">
                <i class='bx bx-transfer-alt'></i>
                <span class="links_name">Transaksi</span>
            </a>
            <span class="tooltip">Transaksi</span>
        </li>
        <li class='@if(Request::segment(2) =="pelanggan") active @endif'>
            <a href="{{ URL('/manage/pelanggan') }}">
                <i class='bx bx-user-pin'></i>
                <span class="links_name">Pelanggan</span>
            </a>
            <span class="tooltip">Pelanggan</span>
        </li>
        <li class='@if(Request::segment(2) =="site") active @endif'>
            <a href="{{ URL('/manage/site') }}">
                <i class='bx bx-window-alt'></i>
                <span class="links_name">Landing Page</span>
            </a>
            <span class="tooltip">Landing Page</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-stats'></i>
                <span class="links_name">Statistik</span>
            </a>
            <span class="tooltip">Statistik</span>
        </li>
        <li>
            <a href="#">
                <i class='bx bx-palette'></i>
                <span class="links_name">Themes</span>
            </a>
            <span class="tooltip">Themes</span>
        </li>
        <li class='@if(Request::segment(2) =="tagihan") active @endif'>
            <a href="{{ URL('/manage/tagihan') }}">
                <i class='bx bx-receipt'></i>
                <span class="links_name">Tagihan</span>
            </a>
            <span class="tooltip">Tagihan</span>

        </li>
        <li class='@if(Request::segment(2) =="penarikan") active @endif'>
            <a href="{{ URL('/manage/penarikan') }}">
                <i class='bx bxs-wallet'></i>
                <span class="links_name">Penarikan</span>
            </a>
            <span class="tooltip">Penarikan</span>

        </li>



        <li class="profile">
            <div class="profile-details">
                <img src="https://lh3.googleusercontent.com/a-/ALV-UjUccW-EKUvTzoyR84Zrawl3x7A3hWb2EVfb9ewTEzaBGjW11Qg=s96-c" alt="profileImg">
                <div class="name_job">
                    <div class="name">{{Session::get('user_name')}}</div>
                    <div class="job">Customer</div>
                </div>
            </div>
            <a href="{{ URL('/auth/logout') }}"><i class='bx bx-log-out' id="log_out"></i></a>
        </li>
    </ul>
</div>


<script type="text/javascript">
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
        }
    }

</script>

<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />


<style>
    /* Google Font Link */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .nav-list {
        padding-left: 0px !important;
    }

    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 78px;
        background: #2f1893;
        padding: 6px 14px;
        z-index: 99;
        transition: all 0.5s ease;
    }

    .sidebar.open {
        width: 250px;
    }

    .sidebar .logo-details {
        height: 60px;
        display: flex;
        align-items: center;
        position: relative;
    }

    .sidebar .logo-details .icon {
        opacity: 0;
        transition: all 0.5s ease;
    }

    .sidebar .logo-details .logo_name {
        color: #fff;
        font-size: 20px;
        font-weight: 600;
        opacity: 0;
        transition: all 0.5s ease;
    }

    .sidebar.open .logo-details .icon,
    .sidebar.open .logo-details .logo_name {
        opacity: 1;
    }

    .sidebar .logo-details #btn {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        font-size: 22px;
        transition: all 0.4s ease;
        font-size: 23px;
        text-align: center;
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .sidebar.open .logo-details #btn {
        text-align: right;
    }

    .sidebar i {
        color: #fff;
        height: 60px;
        min-width: 50px;
        font-size: 28px;
        text-align: center;
        line-height: 60px;
    }

    .sidebar .nav-list {
        margin-top: 20px;
        height: 100%;
    }

    .sidebar li {
        position: relative;
        margin: 8px 0;
        list-style: none;
    }

    .sidebar li .tooltip {
        position: absolute;
        top: -20px;
        left: calc(100% + 15px);
        z-index: 3;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 15px;
        font-weight: 400;
        opacity: 0;
        white-space: nowrap;
        pointer-events: none;
        transition: 0s;
    }

    .sidebar li:hover .tooltip {
        opacity: 1;
        pointer-events: auto;
        transition: all 0.4s ease;
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar.open li .tooltip {
        display: none;
    }

    .sidebar input {
        font-size: 15px;
        color: #2f1893;
        font-weight: 400;
        outline: none;
        height: 50px;
        width: 100%;
        width: 50px;
        border: none;
        border-radius: 12px;
        transition: all 0.5s ease;
        background: #2f1893;

    }

    .sidebar input:hover {
        background: #fff;
        color: #2f1893
    }

    .sidebar input[placeholder] {
        color: #fff;
    }

    .sidebar input::-webkit-input-placeholder {
        color: #fff;
    }

    .sidebar input:-moz-placeholder {
        color: #fff;
    }

    .sidebar input[placeholder]:hover {
        color: #2f1893;
    }

    .sidebar input[placeholder]:hover i {
        color: #2f1893;
    }

    .sidebar.open input {
        padding: 0 20px 0 50px;
        width: 100%;
    }


    .sidebar .bx-search {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
        font-size: 22px;
        background: #2f1893;
    }

    .sidebar.open .bx-search:hover {
        background: #2f1893;
        color: #fff;
    }

    .bx-search:hover i {
        color: #2f1893;
    }

    .sidebar .bx-search:hover {
        background: #2f1893;
        color: #fff;
    }

    .sidebar li a {
        display: flex;
        height: 100%;
        width: 100%;
        border-radius: 12px;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
    }

    .sidebar li a:hover {
        background: #FFF;
    }

    .sidebar li a .links_name {
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: 0.4s;
    }

    .sidebar.open li a .links_name {
        opacity: 1;
        pointer-events: auto;
    }

    .sidebar li a:hover .links_name,
    .sidebar li a:hover i {
        transition: all 0.5s ease;
        color: #2f1893;
    }

    .sidebar li i {
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        border-radius: 12px;
    }

    .sidebar li.active {
        background: #1d1b31 !important;
        border-radius: 12px;
    }

    .sidebar li:hover i {
        background: #fff !important;
    }


    .sidebar li.profile {
        position: fixed;
        height: 60px;
        width: 78px;
        left: 0;
        bottom: -8px;
        padding: 10px 14px;
        background: #26156f;

        transition: all 0.5s ease;
        overflow: hidden;
    }

    .sidebar.open li.profile {
        width: 250px;
    }

    .sidebar li .profile-details {
        display: flex;
        align-items: center;
        flex-wrap: nowrap;
    }

    .sidebar li img {
        height: 45px;
        width: 45px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 10px;
    }

    .sidebar li.profile .name,
    .sidebar li.profile .job {
        font-size: 15px;
        font-weight: 400;
        color: #fff;
        white-space: nowrap;
    }

    .sidebar li.profile .job {
        font-size: 12px;
    }

    .sidebar .profile #log_out {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        background: #26156f;
        width: 100%;
        height: 60px;
        line-height: 60px;
        border-radius: 0px;
        transition: all 0.5s ease;
    }

    .sidebar.open .profile #log_out {
        width: 50px;
        background: none;
    }

    .home-section {
        position: relative;
        background: #E4E9F7;
        min-height: 100vh;
        top: 0;
        left: 78px;
        width: calc(100% - 78px);
        transition: all 0.5s ease;
        z-index: 2;
    }

    .sidebar.open~.home-section {
        left: 250px;
        width: calc(100% - 250px);
    }

    .home-section .text {
        display: inline-block;
        color: #2f1893;
        font-size: 25px;
        font-weight: 500;
        margin: 18px
    }

    @media (max-width: 420px) {
        .sidebar li .tooltip {
            display: none;
        }
    }

</style>
