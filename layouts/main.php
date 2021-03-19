<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Tracker</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Corona Tracker</a>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        states
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/India/state/karnataka">Karnataka</a></li>
                        <li><a class="dropdown-item" href="/India/state/Tamilnadu">Tamil Nadu</a></li>
                        <li><a class="dropdown-item" href="/India/state/Maharashtra">Andhra Pradesh</a></li>
                    </ul>
                    <!-- <form action="/India/state" method="post" class="my-2">
                        <select name="states" id="options" class="btn btn-secondary btn-sm">
                            <option value="KA">karnataka</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="MH">Maharashtra</option>
                        </select>
                        <input type="submit" name="submit" class="btn btn-outline-primary btn-sm" value="search">
                    </form> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/India/dailyrecords">India</a>
                </li>
            </ul>
        </div>
    </nav>
    {{content}}
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>
</html>