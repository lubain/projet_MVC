<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Messaging App UI with Dark Mode</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- partial:index.partial.html -->
    <div class="app">
        <div class="header">
            <a href="<?= base_url("public/"); ?>" class="logo">
                <svg viewBox="0 0 513 513" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M256.025.05C117.67-2.678 3.184 107.038.025 245.383a240.703 240.703 0 0085.333 182.613v73.387c0 5.891 4.776 10.667 10.667 10.667a10.67 10.67 0 005.653-1.621l59.456-37.141a264.142 264.142 0 0094.891 17.429c138.355 2.728 252.841-106.988 256-245.333C508.866 107.038 394.38-2.678 256.025.05z" />
                    <path d="M330.518 131.099l-213.825 130.08c-7.387 4.494-5.74 15.711 2.656 17.97l72.009 19.374a9.88 9.88 0 007.703-1.094l32.882-20.003-10.113 37.136a9.88 9.88 0 001.083 7.704l38.561 63.826c4.488 7.427 15.726 5.936 18.003-2.425l65.764-241.49c2.337-8.582-7.092-15.72-14.723-11.078zM266.44 356.177l-24.415-40.411 15.544-57.074c2.336-8.581-7.093-15.719-14.723-11.078l-50.536 30.744-45.592-12.266L319.616 160.91 266.44 356.177z" fill="#fff" />
                </svg>
            </a>
            <div class="search-bar">
                <input type="text" placeholder="Search..." />
            </div>
            <div class="user-settings">
            <div class="dark-light">
                <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
            </div>
            <div class="settings">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3" />
                <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" /></svg>
            </div>
            <img class="user-profile" src="../<?= $user['profile_photo'] ?>" alt="" class="account-profile" alt="">
        </div>
    </div>
    <div class="wrapper">
        <div class="conversation-area">
            <?php foreach ($conversations as $conversation): ?>
            <a href="<?= esc($conversation->id) ?>" class="msg online" style="text-decoration: none;">
                <img class="msg-profile" src="../<?= esc($conversation->profile_photo) ?>" alt="" />
                <div class="msg-detail">
                    <div class="msg-username"><?= esc($conversation->nom) ?> <?= esc($conversation->prenom) ?></div>
                    <div class="msg-content">
                        <span class="msg-message"><?= esc($conversation->content) ?></span>
                        <span class="msg-date">20m</span>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
            <!-- <button class="add"></button> -->
            <div class="overlay"></div>
        </div>
        <div class="chat-area chatArea">
            <div class="chat-area-header">
                <div class="chat-area-title">CodePen Group</div>
                <div class="chat-area-group">
                    <img class="chat-area-profile" src="" alt="" />
                    <img class="chat-area-profile" src="" alt="">
                    <img class="chat-area-profile" src="" alt="" />
                    <span> </span>
                </div>
            </div>
            <div class="chat-area-main">
                <?php foreach ($messages as $message): ?>
                <div class="chat-msg <?php if ($message->sender_id == session()->get('id')){echo 'owner';} ?>">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="../<?= esc($message->profile_photo) ?>" alt="" />
                        <div class="chat-msg-date">Message seen <?= esc($message->created_at) ?></div>
                    </div>
                    <div class="chat-msg-content">
                        <!-- <div class="chat-msg-text">Luctus et ultrices posuere cubilia curae.</div> -->
                        <!-- <div class="chat-msg-text">
                            <img src="" />
                        </div> -->
                        <div class="chat-msg-text"><?= esc($message->content) ?></div>
                    </div>
                </div>
                <!-- <div class="chat-msg owner">
                    <div class="chat-msg-profile">
                        <img class="chat-msg-img" src="../../" alt="" />
                        <div class="chat-msg-date">Message seen 1.22pm</div>
                    </div>
                    <div class="chat-msg-content">
                        <div class="chat-msg-text">Sit amet risus nullam eget felis eget. Dolor sed viverra ipsum😂😂😂</div>
                        <div class="chat-msg-text">Cras mollis nec arcu malesuada tincidunt.</div>
                    </div>
                </div> -->
                <?php endforeach; ?>
            </div>
            <form method="post" class="chat-area-footer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                    <path d="M23 7l-7 5 7 5V7z" />
                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                    <circle cx="8.5" cy="8.5" r="1.5" />
                    <path d="M21 15l-5-5L5 21" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M12 8v8M8 12h8" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip">
                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48" />
                </svg>
                <input type="text" name="messages" placeholder="Type something here..." required/>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile">
                    <circle cx="12" cy="12" r="10" />
                    <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01" />
                </svg>
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up"> -->
                <button type="submit" style="background: none;border:none;margin: 5px 0 0 5px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="110 110 275 275" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M330.518 131.099l-213.825 130.08c-7.387 4.494-5.74 15.711 2.656 17.97l72.009 19.374a9.88 9.88 0 007.703-1.094l32.882-20.003-10.113 37.136a9.88 9.88 0 001.083 7.704l38.561 63.826c4.488 7.427 15.726 5.936 18.003-2.425l65.764-241.49c2.337-8.582-7.092-15.72-14.723-11.078zM266.44 356.177l-24.415-40.411 15.544-57.074c2.336-8.581-7.093-15.719-14.723-11.078l-50.536 30.744-45.592-12.266L319.616 160.91 266.44 356.177z" fill="#0086ff" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="detail-area">
            <div class="detail-area-header">
                <div class="msg-profile group">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M12 2l10 6.5v7L12 22 2 15.5v-7L12 2zM12 22v-6.5" />
                        <path d="M22 8.5l-10 7-10-7" />
                        <path d="M2 15.5l10-7 10 7M12 2v6.5" />
                    </svg>
                </div>
                <div class="detail-title">CodePen Group</div>
                <div class="detail-subtitle">Created by Aysenur, 1 May 2020</div>
                <div class="detail-buttons">
                    <button class="detail-button">
                        <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                        </svg>
                        Call Group
                    </button>
                    <button class="detail-button">
                        <svg viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                            <path d="M23 7l-7 5 7 5V7z" />
                            <rect x="1" y="5" width="15" height="14" rx="2" ry="2" />
                        </svg>
                        Video Chat
                    </button>
                </div>
            </div>
            <div class="detail-changes">
                <input type="text" placeholder="Search in Conversation">
                <div class="detail-change">
                    Change Color
                    <div class="colors">
                        <div class="color blue selected" data-color="blue"></div>
                        <div class="color purple" data-color="purple"></div>
                        <div class="color green" data-color="green"></div>
                        <div class="color orange" data-color="orange"></div>
                    </div>
                </div>
                <div class="detail-change">
                    Change Emoji
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-thumbs-up">
                        <path d="M14 9V5a3 3 0 00-3-3l-4 9v11h11.28a2 2 0 002-1.7l1.38-9a2 2 0 00-2-2.3zM7 22H4a2 2 0 01-2-2v-7a2 2 0 012-2h3" />
                    </svg>
                </div>
            </div>
            <div class="detail-photos">
                <div class="detail-photo-title">
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                        <circle cx="8.5" cy="8.5" r="1.5" />
                        <path d="M21 15l-5-5L5 21" />
                    </svg>
                    ared photos
                    </div>
                    <div class="detail-photo-grid">
                        <img src="" />
                        <img src="" />
                        <img src="" />
                        <img src="" />
                        <img src="" />
                        <img src="" />
                        <img src="" />
                        <img src="" />

                        <img src="" />
                        <img src="" />
                        <img src="" />
                    </div>
                    <div class="view-more">View More</div>
                </div>
                <a href="" class="follow-me" target="_blank">
                    <span class="follow-text">
                        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                        </svg>
                        Follow me on Twitter
                    </span>
                    <span class="developer">
                        <img src="" />
                        Aysenur Turk — @AysnrTrkk
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script  src="../script.js"></script>

</body>
</html>
