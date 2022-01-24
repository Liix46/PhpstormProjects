<doctype html></doctype>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Галерея</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <style>
        uploader {
            border: 1px solid #ccc;
            box-shadow: 5px 5px 2px #aaa;
            display: inline-block;
            margin: 5px;
            padding: 5px;
        }
        gallery{
            display: flex;
            flex-wrap: wrap;
            background-color: snow;
        }
        gallery .picture{
            border: 1px solid salmon;
            display: flex;

            flex-direction: column;

        }

        gallery .picture img {
            max-width: 20vw;
        }
        gallery .picture b{
            display: block;
        }
    </style>
</head>
<body>
<h1>Галерея</h1>

<uploader>
    <input type="file" name="pictureFile" />
    <br/>
    <label>
<textarea name="pictureDescription">
    Это самая лучшая
</textarea>
    </label>
    <button name="addPicture">Добавить</button>
</uploader>

<footer>
    <hr/>
    <?php
    echo "&copy; ITSTEP, КН-П-181, 2018 - " . date( "Y" ) ;
    ?>
</footer>

<gallery></gallery>

<script src="gallery.js"></script>
</body>
</html>