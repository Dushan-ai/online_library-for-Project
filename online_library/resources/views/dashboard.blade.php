<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <title>Dashboard</title>
  </head>
  <style>
    .result-content{
        align-items: center;
        position: relative;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        border-radius: 10px;
        padding: 0px; 
    }
    .result-content img {
        width: 50px;
        height: 50px;
        cursor: pointer;
        border-radius: 50%;
    }
    .result-box {
        width:100%;
        align-items: center;
        margin-bottom: 1px;
    }
    .result-box li {
        list-style: none;
        border-radius: 3px;
        padding: 15px;
        cursor: pointer;
    }
    .result-box table {
        width: 100%;
        background: #e9f3ff;
        border-radius: 20px;
        padding: 20px;
        gap: 5px;
        list-style: none;
        cursor: pointer;
    }
    .result-box table:hover{
        background-color:rgba(133, 194, 243, 0.822);
    }
    .result-box tr {
        height:50px;
    }
    .search-box-id  {
        display: flex;
        flex-flow: row;
    }
    /*table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }*/

    /* Popup container */
    .popup {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9999; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    /* Popup content */
    .popup-content {
        background-color: #fefefe;
        margin: 5% auto; /* 5% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 50%; /* Could be more or less, depending on screen size */
    }
  </style>
<body>

  <div class="sidebar">
    <div class = "logo"></div>
        <ul class="menu">
            <li>
                <a href="profile">
                    <i class="ifas fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="borrowed">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>History</span>
                </a>
            </li>
            <li>
                <a href="settings">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
  </div>

  <div class= "main-content">
    <div class= "header-wrapper">
        <div class="header-title">
            <span style="vertical-align: text-top;"></span><br>
            <h3 style="vertical-align: text-top;">Dashboard</h3>
        </div>
        <div calss="user-info">
            <div class= "search-box" >
            <form style="display:flex;">
                <input type="text" name="searchid" id="live_search" placeholder="Search" style="width: 550px;" autocomplete="off">
                <button><i class="fa-solid fa-search" style="color: rgba(96, 175, 240, 0.822);"></i></button>
            </form>
            </div>
        </div>
        <?php if (!empty($profileDP)) { echo "<img src='../upload/" . $profileDP . "' width='250px'>";
                }else  echo "<img src='/icon/default_profile.png' /> " ?>
    </div>

    <div class="result-content">
        <div class="result-box" id="resultbox"></div> 
    </div>
     
    <div class= "chat-content">
        <div class="chat-header-wrapper">
            <div id="chat-box" class="chat-box">
                <!-- Messages will be displayed here -->
                 @foreach($books as $book)
                <div class="pop-come align-self-end border rounded p-2 mb-1" style="text-align: justify;">
                    <table style="width:100%">
                        <tr style="height:50px; border-bottom: 5px solid black;">
                            <th style="width:1%">
                                <p>
                                    <img src="{{ asset('icon/default_book.jpg') }}" class="img1" width="50px">
                                </p>
                            </th>
                            <th style="width:88%" colspan="3">
                                <p><b>{{ $book->title }}</b><br><a href="">Genre: {{ $book->type }}</a></p>
                            </th>
                            <th style="width:1%; text-align: right;">
                            </th>
                        </tr>
                        <tr>
                            <td colspan="3" style="width:90%">
                                <p class="rtext">{!! (e($book->description)) !!}</p>
                                <p style="text-align:right; color: black; margin-right: 85px; margin-bottom: 0px;"><b>Price:</b> Rs. {{ $book->price }}</p><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height:10px; width:99%; text-align:right;">
                                @php
                                    $borrowed = session('borrowed', []);
                                @endphp

                                @if(in_array($book->id, $borrowed))
                                    <!-- Show Return button if book is borrowed -->
                                    <form method="POST" action="{{ route('return.book', $book->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" style="margin-right: 100px; margin-bottom: 10px;">Return</button>
                                    </form>
                                @else
                                    <!-- Show Borrow button if book is NOT borrowed -->
                                    <form method="POST" action="{{ route('borrow.book', $book->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary" style="margin-right: 100px; margin-bottom: 10px;">Borrow</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        <tr style="height:10px">
                            <td colspan="3" style="width:10%; text-align:right;">
                                <small class="d-block">{{ $book->created_at->format('F d, Y h:i A') }}</small>
                            </td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div id="book-popup" class="popup">
    <div id="content-popup" class="content-popup">
        <table style="text-align: justify; width:100%">
            <tr style="height:50px; border-bottom: 5px solid black;">
                <th style="width:1%">
                    <p>
                        <img id="popup-image" src="{{ asset('icon/default_book.jpg') }}" class="img1" width="50px" alt="Book Image">
                    </p>
                </th>
                <th style="width:98%" colspan="3">
                    <p><b id="popup-title"></b><br><a href="#" id="popup-genre"></a></p>
                </th>
                <th style="width:1%; text-align: right;">
                    <span class="close" id="close-popup">&times;</span>
                </th>
            </tr>
            <tr>
                <td colspan="3" style="width:90%">
                    <p class="rtext" id="popup-description"></p>
                    <p style="text-align:right; color: black; margin-right: 50px; margin-bottom: 10px;"><b>Price:</b> Rs. <span id="popup-price"></span></p>
                </td>
            </tr>
                <tr>
                    <td colspan="3" style="height:10px; width:99%; text-align:right;">
                    @php
                        $borrowed = session('borrowed', []);
                    @endphp
                    @if(in_array($book->id, $borrowed))
                        <!-- Show Return button if book is borrowed -->
                        <form method="POST" action="{{ route('return.book', $book->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-warning" style="margin-right: 100px; margin-bottom: 10px;">Return</button>
                        </form>
                    @else
                        <!-- Show Borrow button if book is NOT borrowed -->
                        <form method="POST" action="{{ route('borrow.book', $book->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="margin-right: 100px; margin-bottom: 10px;">Borrow</button>
                        </form>
                    @endif
                </td>
            </tr>
            <tr style="height:10px">
                <td colspan="3" style="width:10%; text-align:right;">
                    <small class="d-block" id="popup-date"></small>
                </td>
            </tr>
        </table>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        let books = [];

        $('#live_search').on('keyup', function () {
            let query = $(this).val();

            if (query.length > 1) {
                $.ajax({
                    url: "{{ route('books.search') }}",
                    type: 'GET',
                    data: { query: query },
                    success: function (data) {
                        books = data; // store books
                        let html = '<ul class="list-group">';
                        if (data.length > 0) {
                            $.each(data, function (i, book) {
                                html += `<li class="list-group-item book-item" data-id="${book.id}" style="cursor:pointer;">
                                            <strong>${book.title}</strong> - ${book.type}<br>
                                            <small>${book.description.substring(0, 50)}...</small>
                                        </li>`;
                            });
                        } else {
                            html += '<li class="list-group-item">No results found</li>';
                        }
                        html += '</ul>';
                        $('#resultbox').html(html);
                    }
                });
            } else {
                $('#resultbox').html('');
            }
        });

        // When clicking on a book list item, show the popup table with book details
        $(document).on('click', '.book-item', function () {
            let bookId = $(this).data('id');
            let book = books.find(b => b.id === bookId);

            if (book) {
                // Update popup fields
                $('#popup-title').text(book.title);
                $('#popup-genre').text(`Genre: ${book.type}`).attr('href', '#');
                $('#popup-description').text(book.description);
                $('#popup-price').text(book.price);

                // Format date (assuming ISO 8601 string from backend)
                let createdAt = new Date(book.created_at);
                let options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute:'2-digit', hour12: true };
                $('#popup-date').text(createdAt.toLocaleString('en-US', options));

                // Set book image if exists, else default
                if (book.image_url) {
                    $('#popup-image').attr('src', book.image_url);
                } else {
                    $('#popup-image').attr('src', "{{ asset('icon/default_book.jpg') }}");
                }

                $('#book-popup, #popup-overlay').show();
            }
        });

        // Close popup
        $('#close-popup, #popup-overlay').on('click', function () {
            $('#book-popup, #popup-overlay').hide();
        });
    });

    $(document).on('click', '.book-item', function () {
        let book = $(this).data();

        // Fill popup content
        $('#popup-title').text(book.title);
        $('#popup-genre').text(`Genre: ${book.genre}`);
        $('#popup-description').text(book.description);
        $('#popup-price').text(book.price);
        $('#popup-date').text(new Date(book.date).toLocaleString());
        $('#popup-image').attr('src', `/upload/${book.image}`);

        // Set form actions dynamically
        $('#borrow-form').attr('action', `/books/session/${book.id}`);

        // Check if already borrowed (via AJAX)
        $.get(`/books/session/check/${book.id}`, function (data) {
            if (data.borrowed) {
                $('#borrow-button').removeClass('btn-primary').addClass('btn-danger').html('<i class="fa fa-undo"></i> Return');
            } else {
                $('#borrow-button').removeClass('btn-danger').addClass('btn-primary').html('<i class="fa fa-book"></i> Borrow');
            }
        });

        $('#book-popup').show();
    });
</script> 
</body>
</html>