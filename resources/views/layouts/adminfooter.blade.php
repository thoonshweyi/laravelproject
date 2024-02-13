<!-- Start Footer Section -->
<footer class="footers">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-8 ms-auto">
                        <div class="row border-top pt-3">
                            <div class="col-lg-6 text-center">
                                <div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item me-2">
                                            <a href="#" class="text-dark">Data Land Technology Co.,Ltd</a>
                                        </li>
                                        <li class="list-inline-item me-2">
                                            <a href="#" class="text-dark">About</a>
                                        </li>
                                        <li class="list-inline-item me-2">
                                            <a href="#" class="text-dark">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 text-center">
                                <p>&copy; <span id="getyear"></span> Copyright, All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer Setion -->


        <!-- Start Right Navbar -->
        <div class="right-panels">
            <h6>Custom your template</h6>
            <p class="small">Hifi!! here you can change your theme</p>

            <hr/>

            <div class="themecolors">
                <a href="javascript:void(0);"><i class="fas fa-square text-primary shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-secondary shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-info shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-success shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-warnning shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-danger shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-muted shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-white shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-black shadow fa-lg"></i></a>
                <a href="javascript:void(0);"><i class="fas fa-square text-light shadow fa-lg"></i></a>
            </div>
        </div>
        <!-- End Right Navbar -->




        <!-- bootstrap css1 js1 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <!-- jquery js1 -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" type="text/javascript"></script>
        <!-- jqueryui css1 js1 -->
        <script src="{{asset('./assets/libs/jquery-ui-1.13.2.custom/jquery-ui.min.js')}}"></script>
        <!-- Google Chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <!-- Chartjs js1 -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- Raphael must be included before justgage -->
        <!-- https://github.com/toorshia/justgage -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
        <!-- custom js js1 -->
        <script src="{{ asset('assets/dist/js/app.js') }}" type="text/javascript"></script>

        <!-- Extra js -->
        @yield('scripts')
    </body>
</html>
