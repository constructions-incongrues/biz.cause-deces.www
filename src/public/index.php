<?php
$data = json_decode(file_get_contents(__DIR__.'/data.json'), true);
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <title>cause-deces.biz</title>
    <meta charset="utf-8" />
    <link rel="icon" href="favicon.gif" type="image/gif" />
    <style>
body { margin-top:2em; margin-left:2em; font-family:Futura, sans-serif; }
img { margin-top:0.3em; padding:0; width:250px; }
    </style>
    <meta property="og:title" content="cause-deces.biz" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Les souvenirs passent, les objets restent" />
    <meta property="og:url" content="http://www.cause-deces.biz" />
    <meta property="og:image" content="http://www.cause-deces.biz/ogp.png" />
</head>

<body>
<div id="container" class="js-masonry" data-masonry-options='{ "columnWidth": 20, "itemSelector": ".item" }'>
<?php foreach ($data['results']['collection1'] as $classified): ?>
    <?php if ($classified['picture']['src'] != '' && $classified['picture']['src'] != 'http://static.leboncoin.fr/img/trans-1px.gif'): ?>
    <div class="item">
        <a href="<?php echo $classified['title']['href'] ?>" title="<?php echo $classified['title']['text'] ?>" target="_blank"><img src="<?php echo $classified['picture']['src']?>" /></a>
    </div>
    <?php endif ?>
<?php endforeach ?>
</div>
    <p>Un projet de <a href="http://www.marionbalac.com">Marion Balac</a> développé par <a href="http://www.constructions-incongrues.net">Constructions Incongrues</a> et hébergé par <a href="http://www.pastis-hosting.net">Pastis Hosting</a> - Code <a href="https://github.com/constructions-incongrues/biz.cause-deces.www">distribué</a> sous licence <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPLv3</a> - 2015</p>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>
</body>

</html>
