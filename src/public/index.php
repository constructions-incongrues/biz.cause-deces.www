<?php
// Fetch configuration
require_once(__DIR__.'/../config.php');

// Load ads data
$data = json_decode(file_get_contents(__DIR__.'/'.$config['causeTitle'].'/data.json'), true);
?>
<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <title><?php echo $config['causeTitle'] ?></title>
    <meta charset="utf-8" />
    <link rel="icon" href="<?php echo $config['causeTitle'] ?>/favicon.gif" type="image/gif" />
    <style>
body { margin-top:2em; margin-left:2em; font-family:Futura, sans-serif; }
img { margin-top:0.3em; padding:0; width:104px; }
    </style>
    <meta property="og:title" content="<?php echo $config['causeTitle'] ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo $config['causeDescription'] ?>" />
    <meta property="og:url" content="<?php echo $config['causeUrlRoot'] ?>" />
    <meta property="og:image" content="<?php echo $config['causeUrlRoot'] ?>/<?php echo $config['causeTitle'] ?>/ogp.png" />
</head>

<body>
<div id="container">
<?php foreach ($data['classifieds'] as $classified): ?>
    <?php if (isset($classified['picture'])): ?>
    <div class="item">
        <a href="<?php echo $classified['href'] ?>" title="<?php echo $classified['title'] ?>" target="_blank">
            <img src="<?php echo $classified['picture'] ?>" onerror="this.parentNode.parentNode.remove();" />
        </a>
    </div>
    <?php endif ?>
<?php endforeach ?>
</div>
    <p>Un projet de <a href="http://www.marionbalac.com">Marion Balac</a> développé par <a href="http://www.constructions-incongrues.net">Constructions Incongrues</a> et hébergé par <a href="http://www.pastis-hosting.net">Pastis Hosting</a> - Code <a href="https://github.com/constructions-incongrues/biz.cause-deces.www">distribué</a> sous licence <a href="http://www.gnu.org/licenses/agpl-3.0.html">AGPLv3</a> - 2015</p>
    <script src="http://imagesloaded.desandro.com/imagesloaded.pkgd.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>
    <script>
// @see http://masonry.desandro.com/appendix.html#imagesloaded
var container = document.querySelector('#container');
var msnry;
// initialize Masonry after all images have loaded
imagesLoaded(container, function() {
    msnry = new Masonry(container, {
        columnWidth: 16,
        itemSelector: ".item"
    });
});
    </script>
</body>

</html>
