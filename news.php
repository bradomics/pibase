<!doctype html>
<html lang="en">
  <?php include('./partials/head.php'); ?>
  <?php
  if($db->getAppTheme() === 'light'){
      ?>
      <link href="css/pages/news.css" rel="stylesheet">
      <?php
  }
  ?>
  <body>
    <?php include('./partials/navbar.php'); ?>
    <main role="main" class="container">
    <?php
    if($db->showTrendingTwitterTopics() === 'true'){
        ?>
        <div class="row">
            <div class="col-lg-12 my-2">
                <div class="card text-white">
                    <div class="twitterTickerContainer card-body">
                        <div class="twitterTickerWrapper">
                            <span class="twitterTickerContent"></span>
                            <span>Loading...</span>
                            <span class="tickerContent__loadingText"><span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if($db->showTopRedditPosts() === 'true'){
        ?>
        <div class="row">
            <div class="col-lg-12 my-2">
                <div class="card text-white">
                    <div class="redditTickerContainer card-body">
                        <div class="redditTickerWrapper">
                            <span class="redditTickerContent"></span>
                            <span>Loading...</span>
                            <span class="tickerContent__loadingText"><span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                            <span class="tickerContent__loadingText">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

      <h2 class="mt-3">Headlines</h2>
      <div class="card">
      <div class="headlinesContainer card-body">
        <div class="headlinesWrapper">
        <?php
        if($db->getCNNSource() === 'true'){
            ?>
            <h3 class="mt-3">CNN</h3>
            <div class="cnnContainer">
                <div class="cnnStory"></div>
            </div>
            <?php
        }
        ?>
        <?php
        if($db->getCBSSource() === 'true'){
            ?>
            <h3 class="mt-3">CBS</h3>
            <div class="cbsContainer">
                <div class="cbsStory"></div>
            </div>
            <?php
        }
        ?>
        <?php
        if($db->getNBCSource() === 'true'){
            ?>
            <h3 class="mt-3">NBC</h3>
            <div class="nbcContainer">
                <div class="nbcStory"></div>
            </div>
            <?php
        }
        ?>
        <?php
        if($db->getFoxSource() === 'true'){
            ?>
            <h3 class="mt-3">Fox News</h3>
            <div class="foxContainer">
                <div class="foxStory"></div>
            </div>
            <?php
        }
        ?>
        <?php
        if($db->getYahooSource() === 'true'){
            ?>
            <h3 class="mt-3">Yahoo!</h3>
            <div class="yahooContainer">
                <div class="yahooStory"></div>
            </div>
            <?php
        }
        ?>
        </div>
      </div>
        </div>
    </div>

    </main><!-- /.container -->

    <?php include('./partials/javascript.php'); ?>

    <script>

        function getNewsfeed(source){
            $.ajax({
                url: './newsfeed/' + source + '.php',
                method: 'get',
                success: function(data){
                    var i = 0;
                    data.channel.item.forEach(function(newsIem, storyIndex){
                        if(source === 'yahoo'){
                            var storyTitle = data.channel.item[storyIndex].title
                        } else {
                            var storyTitle = data.channel.item[storyIndex].description
                        }
                        var storyHTML = '<div class="row my-2">' +
                        '<div class="col-sm-12">' +
                        '<div class="card">' +
                            '<div class="card-body">' +
                            '<h5 class="card-title js-storyTitle">' + storyTitle + '</h5>' +
                            '<h6 class="card-subtitle mb-2 text-muted js-postDate">' + data.channel.item[storyIndex].pubDate +'</h6>' +
                            '<a href="' + data.channel.item[storyIndex].link + '" target="_blank" class="js-readMore">' + data.channel.item[storyIndex].link + '</a>' +
                            '</div>' +
                        '</div>' +
                        '</div>' +
                    '</div>'
                    if(data.channel.item[storyIndex].description !== undefined && data.channel.item[storyIndex].pubDate !== undefined && i < 6){
                        $('.' + source + 'Story').append(storyHTML)
                    }
                    i++
                    })

                },
                error: function(){
                    console.log('error retreiving stories')
                }
            })
        }

        function getTrendingTwitterTopics(){
            $.ajax({
                    url: 'newsfeed/twitter.php',
                    type: 'GET',
                    success: function(data) {
                        
                        if (typeof data.errors === 'undefined' || data.errors.length < 1) {
                            $.each(data[0].trends, function(i, trend) {
                            trendHTML = '&nbsp;<a href=' + trend.url + ' target="_blank">' + trend.name + '</a>&nbsp;'
                            $('.twitterTickerContent').append(trendHTML)
                        });

                        var introHTML = 'Trending on Twitter: '

                        $('.twitterTickerContent').prepend(introHTML)
                        var twitterTickerContainer = $('.twitterTickerContainer');
                        var wrapperWidth = Math.floor((introHTML.length + trendHTML.length) * 100)

                        setInterval(function(wrapperWidth){
                            if(pos == wrapperWidth){
                                twitterTickerContainer.scrollLeft(0)
                            } else {
                                var pos = twitterTickerContainer.scrollLeft();
                            }

                            twitterTickerContainer.scrollLeft(pos + 2);
                            if(pos == wrapperWidth){
                                twitterTickerContainer.scrollLeft(0)
                                var pos = 0
                            }
                        }, 30, wrapperWidth)
                        } else {
                            $('.twitterTickerContent').text('Response error');
                        }
                    },
                    error: function(errors) {
                        $('.twitterTickerContent').text('Request error');
                    }
                });
        }

        function getTopRedditPosts(){
            $.ajax({
                    url: 'newsfeed/reddit.php',
                    type: 'GET',
                    success: function(data) {
                        $.each(data.entry, function(i, post) {
                            postHTML = '&nbsp;<span>' + post.category['@attributes'].label +': </span><a href="' + post.link['@attributes'].href + '" target="_blank">' + post.title + '</a>&nbsp;'
                            $('.redditTickerContent').append(postHTML)

                        });

                        var introHTML = 'Trending on Reddit: '
                        $('.redditTickerContent').prepend(postHTML)
                        $('.redditTickerContainer').css('background-color', '#333333 !important;')

                        var redditTickerContainer = $('.redditTickerContainer');
                        var wrapperWidth = Math.floor((introHTML.length + postHTML.length) * 120)

                        setInterval(function(wrapperWidth){
                            if(pos == wrapperWidth){
                                redditTickerContainer.scrollLeft(0)
                            } else {
                                var pos = redditTickerContainer.scrollLeft();
                            }

                            redditTickerContainer.scrollLeft(pos + 2);
                            if(pos == wrapperWidth){
                                redditTickerContainer.scrollLeft(0)
                                var pos = 0
                            }
                        }, 15, wrapperWidth)
                        
                    },
                    error: function(errors) {
                        $('.twitterTickerContent').text('Request error');
                    }
                });
        }

        function scrollHeadlines() {
            var div = $('.headlinesContainer');

            setInterval(function(){
                var wrapperHeight = Math.floor($('.headlinesWrapper').height()) - 540
                if(pos == wrapperHeight){
                    div.scrollTop(0)
                } else {
                    var pos = div.scrollTop();
                }

                div.scrollTop(pos + 2);
                if(pos == wrapperHeight){
                    div.scrollTop(0)
                    var pos = 0
                }

            }, 100)
        }


        $(document).ready(function(){
            <?php
            if($db->getCNNSource() === 'true'){
                ?>
                getNewsfeed('cnn')
                <?php
            }    
            ?>
            <?php
            if($db->getCBSSource() === 'true'){
                ?>
                getNewsfeed('cbs')
                <?php
            }
            ?>
            <?php
            if($db->getNBCSource() === 'true'){
                ?>
                getNewsfeed('nbc')
                <?php
            }
            ?>
            <?php
            if($db->getFoxSource() === 'true'){
                ?>
                getNewsfeed('fox')
                <?php
            }
            ?>
            <?php
            if($db->getYahooSource() === 'true'){
                ?>
                getNewsfeed('yahoo')
                <?php
            }
            ?>
            <?php
            if($db->showTrendingTwitterTopics() === 'true'){
                ?>
                getTrendingTwitterTopics()
                <?php
            }
            ?>
            <?php
            if($db->showTopRedditPosts() === 'true'){
                ?>
                getTopRedditPosts()
                <?php
            }
            ?>
            scrollHeadlines()
        })
    </script>
  </body>
</html>
