<header id="header">
            <div class="grid-100 tablet-grid-100">
                <span class="logo"><span class="vert">Motion</span>Book</span>
                <nav class="topnav">
                    <a href="#">Motions</a>
                    <a href="#">Designers</a>
                    <a href="#">Teams</a>
                    <a href="#">Jobs</a>
                    <a href="#">About</a>
                </nav>

                <div class="search grid-30 tablet-grid-20">
                    <label for="search">
                        <i class="icon-search"></i>
                        <input type="text" placeholder="Search..." name="search">
                    </label>

                </div>

                <?php if (isset($_SESSION['user'])): ?>
                <div class="right grid-15 tablet-grid-20">
                    <a href="add.php" class="circle-button"><span class="icon-plus"></span></a>
                    <a href="#" class="user"><img src="img/<?= $_SESSION['user']['avatar']; ?>" alt=""></a>
                </div>
                <?php else: ?>
                    <div class="right grid-15 tablet-grid-20">
                        <a href="signIn.php">Sign In</a>
                        <a href="inscription.php">Sign Up</a>
                    </div>
                <?php endif; ?>

            </div>

        </header>
        <div class="submenu">
            <div class="grid-100 tablet-grid-100 grid-parent">
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="index.php" class="active"><span class="icon-layout"></span><span>All</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-heart"></span><span>Popular</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-clock"></span><span>Newest</span></a>
                </div>
                <?php if (isset($_SESSION['user'])): ?>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-users"></span><span>Teams</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-notebook"></span><span>Following</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-star"></span><span>Favorites</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="#"><span class="icon-mail"></span><span>Messages</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="mymotions.php"><span class="icon-cabinet"></span><span>My motions</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="params.html"><span class="icon-cog"></span><span>Settings</span></a>
                </div>
                <div class="grid-10 tablet-grid-10 grid-parent">
                    <a href="logout.php"><span class="icon-close"></span><span>Sign out</span></a>
                </div>
                <?php endif; ?>
            </div>
        </div>