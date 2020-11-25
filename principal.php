<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Análise de popularidade política baseado em tweets</title>

    <link rel="stylesheet" href="/PI_2/css/telaPrincipal.css">
    <link rel="stylesheet" href="/PI_2/css/style.css">


    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Montserrat" rel="stylesheet">

</head>

<body>
    <h1 class="heading">POLITICAL TWEET ANALISYS</h1>
    <form class="c-search-bar" action="/PI_2/show.php">
        <input class="c-search-bar__input" type="search" placeholder="Search">

        <div class="c-search-bar__btn">
            <div class="c-search-bar__toggle"></div>

            <button type="submit" value="Go">
                <svg class="js-search-bar__open" viewBox="0 0 56.97 56.97">
                    <path d="M55.15 51.89l-13.56-14.1A23 23 0 1 0 24 46a22.75 22.75 0 0 0 
                   13.18-4.16L50.82 56a3 3 0 1 0 4.32-4.16zM24 6A17 17 0 1 1 7 23 17 17 0 0 1 24 6z" />
                </svg>

                <svg class="js-search-bar__close" style="display: none;" viewBox="0 0 512 512">
                    <path d="M505.94 6.06a20.68 20.68 0 0 0-29.25 0L6.06 476.69a20.68 20.68
                   0 1 0 29.25 29.25L505.94 35.31a20.68 20.68 0 0 0 0-29.25z" />
                    <path d="M505.94 476.69L35.31 6.06A20.68 20.68 0 1 0 6.06 35.31l470.63
                   470.63a20.68 20.68 0 1 0 29.25-29.25z" />
                </svg>
            </button>
        </div>
    </form>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src="/PI_2/scripts/funcaoPesquisa.js"></script>
</body>

</html>