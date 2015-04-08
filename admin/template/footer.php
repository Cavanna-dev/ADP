
<!--
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
-->


<br />
<footer>
    <div class="container">
        <?php if(!empty(paramConfig('imgBo', $db))): ?>
            <div class="row col-lg-4">
                <img style="max-height: 150px; max-width:300px;" src="../img/imgBo/<?=paramConfig('imgBo', $db)?>"><br/><br/>
            </div>
        <?php endif; ?>
    </div>
</footer>

<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>