<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FRHL Page</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main id="campaign-page-wrap">
        <!-- header menu start -->
        <?php include "header.php"; ?>
        <!-- SIDEBAR NAVIGATION END -->
        <!-- header menu end -->
        <?php include "mob-dropdown.php"; ?>
        <!-- hexagon section desktop start -->
        <div class="main-grid-wrapper">
            <div class="bg-circle"></div>
            <div class="investor-title">
                <h2>INFORMATION FOR INVESTORS</h2>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li class="crumb-active">Home</li>
                </ul>
            </div>
            <div id="content" class="content-main-wrapper project_images">
                <div class="tabs left-sidebar-investor-list toggle">
                    <div class="left-row">
                        <div class="leftside-list-wrap">
                            <?php include 'sidebar.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="hexagon-wrapper hex-grid-demo toggle" data-v-78854f14>
                    <?php include 'tabs-menu.php'; ?>
                </div>
            </div>
        </div>
        <!-- hexagon section desktop end -->
        <!-- footer section start -->
        <?php include 'footer.php'; ?>
        <!-- footer section end -->
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        var sidebar = (function() {
            "use strict";

            var $contnet = $('#content'),
            $sidebar = $('#sidebar'),
            $sidebarBtn = $('#sidebar-btn'),
            $toggleCol = $('body').add($contnet).add($sidebarBtn),
            sidebarIsVisible = false;
            $sidebarBtn.on('click', function() {

                if (!sidebarIsVisible) {
                    bindContent();
                } else {
                    unbindContent();
                }

                toggleMenu();
            });

            function bindContent() {

                $contnet.on('click', function() {
                    toggleMenu();
                    unbindContent();
                });
            }

            function unbindContent() {
                $contnet.off();
            }

            function toggleMenu() {

                $toggleCol.toggleClass('sidebar-show');
                $sidebar.toggleClass('show');

                if (!sidebarIsVisible) {
                    sidebarIsVisible = true;
                } else {
                    sidebarIsVisible = false;
                }
            }
            var $menuToggle = $sidebar.find('.menu-toggle');

            $menuToggle.each(function() {

                var $this = $(this),
                $submenuBtn = $this.children('.menu-toggle-btns').find('.menu-btn'),
                $submenu = $this.children('.submenu');

                $submenuBtn.on('click', function(e) {
                    e.preventDefault();
                    $submenu.slideToggle();
                    $(this).toggleClass('active');
                });
            });

        })();

    // tab js start
        (function() {
            $(function() {
                var toggle;
                return toggle = new Toggle('.toggle');
            });

            this.Toggle = (function() {
                Toggle.prototype.el = null;

                Toggle.prototype.tabs = null;

                Toggle.prototype.panels = null;

                function Toggle(toggleClass) {
                    this.el = $(toggleClass);
                    this.tabs = this.el.find(".tab, .tab2");
                    this.panels = this.el.find(".panel");
                    this.bind();
                }

                Toggle.prototype.show = function(index) {
                    var activePanel, activeTab;
                    this.tabs.removeClass('active');
                    activeTab = this.tabs.get(index);
                    $(activeTab).addClass('active');
                // this.panels.hide();
                // activePanel = this.panels.get(index);
                // return $(activePanel).show();
                };

                Toggle.prototype.bind = function() {
                    var _this = this;
                    return this.tabs.unbind('click').bind('click', function(e) {
                        return _this.show($(e.currentTarget).index());
                    });
                };

                return Toggle;

            })();

        }).call(this);

    // tab js end


    // sidebar dropdown click to open js start
    (function($) { // Begin jQuery
        $(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown, .nav-dp2').toggle();
                // Close one dropdown when selecting another
                $('.nav-dropdown, .nav-dp2').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $('html').click(function() {
                $('.nav-dropdown, .nav-dp2').hide();
            });
        }); // end DOM ready
    })(jQuery); // end jQuery
    // sidebar dropdown click to open js end



    // sidebar dropdown click to open js start
    (function($1) { // Begin jQuery
        $1(function() { // DOM ready
            // If a link has a dropdown, add sub menu toggle.
            $1('ul li a:not(:only-child)').click(function(e) {
                $1(this).siblings('.nav-dp2').toggle();
                // Close one dropdown when selecting another
                $('.nav-dp2').not($1(this).siblings()).hide();
                e.stopPropagation();
            });
            // Clicking away from dropdown will remove the dropdown class
            $1('html').click(function() {
                $1('.nav-dp2').hide();
            });
        }); // end DOM ready
    })(jQuery); // end jQuery
    // sidebar dropdown click to open js end
</script>
<script>
    $(document).ready(function() {


        $(".tab, .tab2").on('click', { param1: "1" }, tabClick);

        $("#select-tabs").on('change', { param1: "0" }, tabClick);

    });

    var tabClick = function(event) {
        var data = event.data.param1;
        if (data == 1) {
            var dataId = $(this).attr("data-id");
            var dataType = $(this).attr("data-type");
            var dataTitle = $(this).attr("data-title");

        } else if (data == 0) {
            var dataId = $(this).find('option:selected').attr('data-id');
            var dataType = $(this).find('option:selected').attr('data-type');
            var dataTitle = $(this).find('option:selected').attr('data-title');
        }

        console.log(dataTitle);

        if (dataType == 0) {
            $.ajax({
                type: 'POST',
                url: 'pages/single-year-notice.php',
                data: {
                    dataType: dataType,
                    dataId: dataId
                },
                success: function(response) {
                    $("div.hexagon-wrapper > ul.hex-grid-demo__list").remove();
                    $("div.hexagon-wrapper").append(response);
                    updateBreadcrumb(dataType, dataId, dataTitle);
                }
            });
        }
        else if (dataType == 1) {
            $.ajax({
                type: 'POST',
                url: 'pages/double-year-notice.php',
                data: {
                    dataType: dataType,
                    dataId: dataId
                },
                success: function(response) {
                    $("div.hexagon-wrapper > ul.hex-grid-demo__list").remove();
                    $("div.hexagon-wrapper").append(response);
                    updateBreadcrumb(dataType, dataId, dataTitle);

                }
            });
        }
    }

    // tab-notice



    $(document).on("click", '#tab-notice', function(event) {
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        var dataNoticeId = $(this).attr("data-notice");
        var dataTitle = $(this).attr("data-title");
        console.log(dataTitle);

        $.ajax({
            type: 'POST',
            url: 'pages/single-year-notice.php',
            data: {
                dataType: dataType,
                dataId: dataId,
                dataNoticeId: dataNoticeId,
            },
            success: function(response) {
                $("div.hexagon-wrapper > ul.hex-grid-demo__list").remove();
                $("div.hexagon-wrapper").append(response);
                updateBreadcrumb(dataType, dataId, dataTitle);

            }
        });
    });


    $(document).on("click", '#year-pdf', function(event) {
        var dataId = $(this).attr("data-id");
        var dataType = $(this).attr("data-type");
        var dataTitle = $(this).attr("data-title");
        console.log(dataTitle);
        $.ajax({
            type: 'POST',
            url: 'pages/pdf_details.php',
            data: {
                dataType: dataType,
                dataId: dataId
            },
            success: function(response) {
                $("div.hexagon-wrapper > ul.hex-grid-demo__list").remove();
                $("div.hexagon-wrapper").append(response);
                updateBreadcrumb(dataType, dataId, dataTitle);

            }
        });
    });


    // Bread crumb
    
    function updateBreadcrumb(dataType, dataId, dataTitle) {
        $(".breadcrumb ul").empty();
        $(".breadcrumb ul").append("<li>Home</li>");
        if (dataType == 0) {
            $(".breadcrumb ul").append("<li>" + dataTitle + "</li>");
        } else if (dataType == 1) {
            $(".breadcrumb ul").append("<li>" + dataTitle + "</li>");
        } else if (dataType == 2) {
            $(".breadcrumb ul").append("<li>Category</li>");
            $(".breadcrumb ul").append("<li>" + dataTitle + "</li>");
        }
    }


</script>
</body>

</html>