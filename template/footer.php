<!--
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
-->
<br />
<footer>
    <div class="container">
        <?php if(!empty(paramConfig('imgFo', $db))): ?>
            <div class="row col-lg-4">
                <blockquote class="pull-right">
                    <img style="max-height: 200px; max-width:350px;" src="img/imgFo/<?=paramConfig('imgFo', $db)?>">
                </blockquote>
                <br/><br/>
                </div>
            <div class="row col-lg-8">
        <?php else: ?>
            <div class="row">
        <?php endif; ?>
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <li class="pull-right"><a href="#top">Back to top</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <p>Made by <a href="#" rel="nofollow">
                        LEGER 'GodLike' Aurélien
                    </a>. Contact his assistant at <a href="mailto:cavannachristophe@gmail.com">cavannachristophe@gmail.com
                    </a>.</p>
                <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pages/LICENSE">MIT License</a>.</p><p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>