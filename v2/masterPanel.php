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
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title">Administrator Panel</span>
                </div>
                <!-- Tabs -->
                <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
                    <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Schedule</a>
                    <a href="#fixed-tab-2" class="mdl-layout__tab">Class Information</a>
                    <a href="#fixed-tab-3" class="mdl-layout__tab">User Information</a>
                    <a href="#fixed-tab-4" class="mdl-layout__tab">Edit Schedules</a>
                    <a href="#fixed-tab-5" class="mdl-layout__tab">Create/Remove a Class</a>
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
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--5-col">
                                <h3>Master Schedule:</h3>
                                <a href='print.php'>Print</a>
                                <?php
                                include("uifunctions.php");
                                masterSchedule();
                                ?>
                            </div>
                            <div class="mdl-cell mdl-cell--2-col"></div>
                            <div class="mdl-cell mdl-cell--5-col">
                                <h3>Find a User's Schedule:</h3>
                                <!-- Numeric Textfield -->
                                <form action="masterPanel.php" method='get'>
                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="userSearchField" name='userSearchField'>
                                        <label class="mdl-textfield__label" for="userSearchField">Enter the user ID</label>
                                        <span class="mdl-textfield__error">Input is not a number!</span>
                                    </div>
                                    <!-- Colored icon button -->
                                    <button type='submit' class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
                                      <i class="material-icons">search</i>
                                    </button>
                                </form>
                                <div>
                                    <?php
                                    include("uifunctions.php");
                                    if(isset($_GET['userSearchField']))
                                    {
                                        $user_id = $_GET['userSearchField'];
                                        echoStudentScheduleUI($user_id);
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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
                <section class="mdl-layout__tab-panel" id="fixed-tab-4">
                    <div class="page-content">
                        <!-- Your content goes here -->
                        
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="fixed-tab-5">
                    <div class="page-content">
                        <!-- Your content goes here -->
                        
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>