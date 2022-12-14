<!-- MINDFULNOTES -->
<!-- WEBSITE AND BRAND DEVELOPED BY NICOLA MONTANARI -->
<!-- Dec 2022 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;500;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- META -->
    <meta charset="UTF-8">
    <meta name="theme-color" content="#8165e6" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

    <!-- ICONS -->
    <link rel="icon" type="image/x-icon" href="imgs/favicon.png">
    <link rel="apple-touch-icon" href="imgs/faviconblack.png" sizes="512x512" />

    <!-- TITLE -->
    <title>MindfulNotes</title>

    <!-- STYLE -->
    <link rel="stylesheet" href="./css/base.css">
</head>
<body>
    <header>
        <nav>
            <ul class='nav-bar'>
                <li class='logo'>
                    <h1><a href="./">MINDFUL<span>NOTES</span></a></h1>
                </li>
                <input type='checkbox' id='check' />
                <span class="menu">
                    <li><a href="explore.php">Explore</a></li>
                    <li><a href="library.php">Library</a></li>
                    <li><a href="dailynotes.php">Daily Notes</a></li>
                    <li><a href="bestquotes.php">Best Quotes</a></li>
                    <!-- <li><a href="#">Help</a></li> -->
                    <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
            </ul>
        </nav>
    </header>
    <main>

    <!-- EXPLORE -->
        <?php if ($templateParams["Type"] == "Explore") { ?>
            <img style="position:fixed" src="imgs/background2blur.png" /> <?php
            foreach ($templateParams["Contents"] as $content): ?>
                <div class="quotecontainer">
                    <p class="quote"><?php echo $content["Content"]; ?></p>
                    <p class="author"><?php echo $content["Name"]; ?></p>
                    <a href="book.php?id=<?php echo $content["ID"]; ?>"><p class="booktitle"><?php echo $content["Title"]; ?></p><a>
                </div>
            <?php endforeach;
        } ?>

        <!-- LIBRARY -->
        <?php if ($templateParams["Type"] == "Library") { ?>
            <img style="position:fixed" src="imgs/background3blur.png" />
            <div id="app" class="card-container">
                <?php
                foreach ($templateParams["Contents"] as $content): ?>
                    <a href="book.php?id=<?php echo $content["ID"]; ?>">
                    <card
                        <?php if ($content["FileName"] != null) {
                        ?> data-image="./imgs/books/<?php echo $content["FileName"]; ?>">
                        <?php
                        } else {
                            ?> data-image="./imgs/books/blankbook.png"> <?php
                        } ?>
                    </card></a>
                <?php endforeach; ?>
            </div>
        <?php
        } ?>

        <!-- SINGLE BOOK -->
        <?php if ($templateParams["Type"] == "Book") { ?>
            <img style="position:fixed" src="imgs/background2blur.png" />
            <div class="bookquotecontainer">
                <p class="booktitlebig"><?php echo $templateParams["Contents"][0]["Title"] ; ?></p>
                <p class="authorname"><?php echo $templateParams["Contents"][0]["Name"]; ?></p>
                <?php
                foreach ($templateParams["Contents"] as $content): ?>
                    <?php if ($content["PersonalNote"]!="None"): ?>
                        <?php if ($content["PersonalNote"]==".h1"): ?>
                            <li class="noteh1"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["PersonalNote"]==".h2"): ?>
                            <li class="noteh2"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["PersonalNote"]==".h3"): ?>
                            <li class="noteh3"><?php echo $content["Content"]; ?></li>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                    <?php else: ?>
                        <?php if ($content["Style"]=="0"): ?>
                            <li class="Underline"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["Style"]=="1"): ?>
                            <li class="green"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["Style"]=="2"): ?>
                            <li class="blue"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["Style"]=="3"): ?>
                            <li class="normal"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["Style"]=="4"): ?>
                            <li class="red"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                        <?php if ($content["Style"]=="5"): ?>
                            <li class="purple"><?php echo $content["Content"]; ?></li>
                        <?php else: ?>
                            <li class="NoColor"><?php echo $content["Content"]; ?></li>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                        <?php endif ?>
                    <?php endif ?>
                <?php endforeach; ?>
            </div> <?php
        } ?>

        <!-- DAILY NOTES -->
        <?php if ($templateParams["Type"] == "DailyNotes") { ?>
            <img style="position:fixed" src="imgs/background2blur.png" /> <?php
            foreach ($templateParams["Contents"] as $content): ?>
                <div class="quotecontainer">
                    <p class="quote"><?php echo $content["Content"]; ?></p>
                    <p class="author"><?php echo $content["Name"]; ?></p>
                    <a href="book.php?id=<?php echo $content["ID"]; ?>"><p class="booktitle"><?php echo $content["Title"]; ?></p><a>
                </div>
            <?php endforeach;
        } ?>

        <!-- BEST QUOTES -->
        <?php if ($templateParams["Type"] == "BestQuotes") { ?>
            <img style="position:fixed" src="imgs/background2blur.png" /> <?php
            foreach ($templateParams["Contents"] as $content): ?>
                <div class="quotecontainer">
                <p class="quote"><?php echo $content["Content"]; ?></p>
                <p class="author"><?php echo $content["Name"]; ?></p>
                <a href="book.php?id=<?php echo $content["ID"]; ?>"><p class="booktitle"><?php echo $content["Title"]; ?></p><a>
                <p class="upvotes"><?php echo $content["UpVotes"]; ?></p>
                </div>
            <?php endforeach;
        } ?>

        <!-- INDEX -->
        <?php if ($templateParams["Type"] == "index") {?>
            <img src="imgs/background2blur.png" />
            <h1 class="mainlogo">MINDFUL<span>NOTES</span></h1>
            <div class="buttons">
                <button onclick="location.href='library.php'">Library</button>
                <button onclick="location.href='explore.php'">Explore</button>
            </div>
            <div class="container">
                <div class="bird-container bird-container--one">
                    <div class="bird bird--two"></div>
                </div>
                <div class="bird-container bird-container--two">
                    <div class="bird bird--two"></div>
                </div>
                <div class="bird-container bird-container--three">
                    <div class="bird bird--three"></div>
                </div>
                <div class="bird-container bird-container--four">
                    <div class="bird bird--four"></div>
                </div>
                <div class="bird-container bird-container--five">
                    <div class="bird bird--five"></div>
                </div>
            </div> <?php
        } ?>

    </main>
    <footer>
        <div class="footer_container">
            <h1>MINDFUL<span>NOTES</span></h1>
            <p>
                Lights up your mind with the best quotes and notes.
            </p>
        </div>
        <div class="footer_bottom">
            <p>Copyright &copy;2022 MINDFULNOTES. Designed by <span>Nicola Montanari</span> </p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>