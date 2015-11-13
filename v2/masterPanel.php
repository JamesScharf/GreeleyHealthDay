<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Greeley Health Day</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
        <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    </head>

    <body>
        <!-- Simple header with fixed tabs. -->
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header
        mdl-layout--fixed-tabs mdl-layout--fixed-drawer">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Administrator Panel</span>
                </div>
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Users</a>
                    <a href="#fixed-tab-2" class="mdl-layout__tab">Classes</a>
                    <a href="#fixed-tab-3" class="mdl-layout__tab">Schedules</a>
                </div>
            </header>
            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Greeley Health Day</span>
                <nav class="mdl-navigation">
                  <a class="mdl-navigation__link" href="">Students</a>
                  <a class="mdl-navigation__link" href="">Teachers</a>
                  <a class="mdl-navigation__link" href="">Administrators</a>
                </nav>
            </div>
            <main class="mdl-layout__content">
                <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                    <div class="page-content">
                        <!-- Your content goes here -->
                        <?php
                        include("functions.php");
                        include("uifunctions.php");
                        include("dbForGreeley.php");
                        //Add student to master schedule
                        $class = "classtest";
                        echoClassInfo($class);
                        //createClass("classtest2", "testTeacher2", 2, "Test Description", 10);
                        ?>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                    <div class="page-content">
                        <!-- Your content goes here -->
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-3">
                    <div class="page-content">
                        <!-- Your content goes here -->
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>