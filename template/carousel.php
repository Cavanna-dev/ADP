<div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
    <?php include_once './allCarousel.php'; ?>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style="height:350px;">
        <?php $compteur = 0; ?>
        <?php while ($resultat = $resultats->fetch(PDO::FETCH_OBJ)) { ?>        
            <div class="item <?php if ($compteur % 2 == 0) echo "active"; ?>">
                <img class="carouselImg" src="./img/uploads_carousel/<?php echo $resultat->source; ?>" alt="<?php echo $resultat->content; ?>">
                <div class="carousel-caption">
                    <?php echo $resultat->content; ?>
                </div>
            </div>
            <?php $compteur++; ?>
        <?php } ?>
    </div>

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for ($i = 0; $i < $compteur; $i++): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></li>
        <?php endfor; ?>
    </ol>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
