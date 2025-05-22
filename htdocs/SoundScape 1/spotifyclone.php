<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>SoundScape</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Ubuntu&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&family=Ubuntu&family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/e22527282e.js"
      crossorigin="anonymous"
    ></script>
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
      integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
    <style>
      #left{
    background-color: black;
    height:745px;
    width:238px;
    color:white;
    position:fixed;
}

#logo{
    font-size: 27px;
    padding: 30px;
}

.leftfeatures{
    list-style:none;
    padding:2px 30px;
}

#leftbelow{
    padding: 40px 30px;
}

#leftsections span,#leftbelow span{
    margin-left:12px;
}

#navbar{
    width: 1300px;
    margin-left: 238px;
    position:fixed;
}

.navbar{
    background-color: #393646;
}

.signup{
    color:aliceblue;
    margin-left:1050px;
    margin-top: 13px;
}

.btn{
    margin-left:30px;
    border-radius: 10%;
}

#main{
    width: 1300px;
    position:relative;
    left:238px;
    top:64px;
    background-color: #4F4557;
    position:fixed;
}

.headmain{
    color:antiquewhite;
    padding-top:25px;
    padding-left:25px;
}

.songdiv{
    background-color: rgb(1, 3, 16);
    width:100px;
    height:272px;
    margin: 20px;
    color:azure;
    border-radius: 20px;
    text-align: center;
}
.songimg{
    margin-top:20px;
    width:190px;
    height:150px;
    border-radius:10px;
}
.songdiv h6{
    padding-top:10px;
}
.far{
    display:none;
}
.fa-heart{
  float:right;
}
#likedsongs{
    cursor:pointer;
}
#home{
  cursor: pointer;
}
.mainlike{
  float: none;
}
a{
  text-decoration: none;
}
    </style>
    <link rel="ico" href="favicon.ico" >
  </head>

  <body>
    <div id="left">
      <div id="logo">
        <!-- <i class="fa-brands fa-spotify fa-xl" style="--fa-primary-color: #ffffff; --fa-secondary-color: #000000; "></i> -->
        <img src="SoundScape.jpg" class="soundscape" height="50" width="70">
        <span>SoundScape</span>
      </div>
      <div id="leftsections">
          <p class="leftfeatures">
            <i class="fa-solid fa-house fa-lg" style="--fa-primary-color: #ffffff; --fa-secondary-color: #000000; "></i>
            <span id="home" onclick="showAllSongs()">Home</span>
          </p>
          <p class="leftfeatures">
            <i class="fa-solid fa-magnifying-glass fa-lg" style="--fa-primary-color: #ffffff; --fa-secondary-color: #000000; "></i>
            <span>Search</span>
          </p>
          <p class="leftfeatures">
            <i class="fa-solid fa-book fa-lg"></i>
            <span>Your library</span>
          </p>
      </div>
      <div id="leftbelow">
        <p class="ownfeature">
          <i class="fa-sharp fa-regular fa-square-plus fa-2x" style="--fa-primary-color: #ffffff; --fa-secondary-color: #000000; "></i>
          <span>Create Playlist</span>
        </p>
        <p class="ownfeature">
          <i class="fa-solid fa-heart fa-2x mainlike" style="--fa-primary-color: #ffffff; --fa-secondary-color: #511056; ""></i>
          <span id="likedsongs">Liked Songs</span>
        </p>
      </div>
    </div>
    <div id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-#393646">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php
            if(!isset($_SESSION['loggedin']))
            {
              echo'<li class="signup"><a href="signup.php">Sign Up</a></li>
              <li><button type="button" class="btn btn-light btn-lg"><a href="login.php">Log in</a></button></li>';
            }
            else
            {
              echo'<li><button type="button" class="btn btn-light btn-lg"><a href="logout.php">Log out</a></button></li>';
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>
    <div id="main">
      <h5 class="headmain">Songs</h5>
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="The_Weeknd_-_Die_for_You.png" alt="not found">
          <h6> DIE FOR YOU</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x" ></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="The_Weeknd_-_Starboy.png" alt="not found">
          <h6> STARBOY</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b273bf01fd0986a195d485922167.jpeg" alt="not found">
          <h6> DEATHBED</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b273c07d5d2fdc02ae252fcd07e5.jpeg" alt="not found">
          <h6> LIFE GOES ON</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b2732f86d9710377e63bfbc82ba8.jpeg" alt="not found">
          <h6> DYNAMITE</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b27360a89b781c62ffe2136e4396.jpeg" alt="not found">
          <h6> MEMORIES</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b27388e3cda6d29b2552d4d6bc43.jpeg" alt="not found">
          <h6> MANIAC</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b27393cd693c5f7717d17dbc6a20.jpeg" alt="not found">
          <h6> NIGHT CHANGES</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b273369cdda85dd63f4ac55fe363.jpeg" alt="not found">
          <h6> LITTLE THINGS</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 songdiv">
          <img class="songimg" src="ab67616d0000b27361724ba7c381d7b067027a51.jpeg" alt="not found">
          <h6> OVERDRIVE</h6>
          <i class="fa-solid fa-circle-pause fa-2x"></i>
          <i class="fa-solid fa-circle-play fa-2x"></i>
          <i class="fa-solid fa-heart fa-2x" ></i>
        </div>
      </div>
    </div>
    <script>
      // Get all the songdiv elements
// Get all the songdiv elements

const songs=document.querySelectorAll(".songdiv");
const songDivs = document.querySelectorAll('.songdiv');

// Initialize audio elements and icons
const audioElements = [];
const playIcons = [];
const pauseIcons = [];
for (let i = 0; i < songDivs.length; i++) {
  const audio = new Audio(`audio${i + 1}.mp3`);
  const playIcon = songDivs[i].querySelector('.fa-circle-play');
  const pauseIcon = songDivs[i].querySelector('.fa-circle-pause');
  pauseIcon.style.display='none';
  audioElements.push(audio);
  playIcons.push(playIcon);
  pauseIcons.push(pauseIcon);
}

// Initialize playing state
let currentSongIndex = -1;

// Function to stop all audio playback
function stopAudio() {
  if (currentSongIndex !== -1) {
    const audio = audioElements[currentSongIndex];
    const playIcon = playIcons[currentSongIndex];
    const pauseIcon = pauseIcons[currentSongIndex];
    audio.pause();
    audio.currentTime = 0;
    playIcon.style.display = 'block';
    pauseIcon.style.display = 'none';
    songDivs[currentSongIndex].classList.remove('playing');
    currentSongIndex = -1;
  }
}

// Function to handle click on songdiv
function handleSongClick(index) {
  if (currentSongIndex === index) {
    // If the same song is clicked, toggle play/pause
    const audio = audioElements[index];
    const playIcon = playIcons[index];
    const pauseIcon = pauseIcons[index];
    if (audio.paused) {
      audio.play();
      playIcon.style.display = 'none';
      pauseIcon.style.display = 'block';
      songDivs[index].classList.add('playing');
    } else {
      audio.pause();
      playIcon.style.display = 'block';
      pauseIcon.style.display = 'none';
      songDivs[index].classList.remove('playing');
    }
  } else {
    // If a different song is clicked, stop the current song and play the new one
    stopAudio();
    const audio = audioElements[index];
    const playIcon = playIcons[index];
    const pauseIcon = pauseIcons[index];
    audio.play();
    playIcon.style.display = 'none';
    pauseIcon.style.display = 'block';
    songDivs[index].classList.add('playing');
    currentSongIndex = index;
  }
}

// Add click event listeners to each songdiv
for (let i = 0; i < songDivs.length; i++) {
  if(playIcons[i].style.display==="none"){
    pauseIcons[i].style.display="block";
  }
  else{
    pauseIcons[i].style.display="none";
  }
  songDivs[i].addEventListener('click', () => {
    handleSongClick(i);
  });
}
function handleHeartClick(index) {
        const heartIcon = songDivs[index].querySelector('.fa-heart');
        if (heartIcon.style.color === 'red') {
          heartIcon.style.color = 'white';
        } else {
          heartIcon.style.color = 'red';
        }
      }
      
      // Function to handle click on "Liked Songs" span
      function handleLikedSongsClick() {
        const mainDiv = document.querySelector('.row');
        mainDiv.innerHTML = '';
        
        for (let i = 0; i < songDivs.length; i++) {
          const heartIcon = songDivs[i].querySelector('.fa-heart');
          if (heartIcon.style.color === 'red') {
            mainDiv.appendChild(songDivs[i]);
          }
        }
      }
      
      // Add click event listeners to each heart icon
      for (let i = 0; i < songDivs.length; i++) {
        const heartIcon = songDivs[i].querySelector('.fa-heart');
        heartIcon.addEventListener('click', () => {
          handleHeartClick(i);
        });
      }
      
      // Add click event listener to "Liked Songs" span
      const likedSongsSpan = document.querySelector('#likedsongs');
      likedSongsSpan.addEventListener('click', handleLikedSongsClick);


      function showAllSongs(){
        const mainDiv = document.querySelector('.row');
        for(let i=0; i<songs.length; i++){
          mainDiv.appendChild(songs[i]);
        }
      }
    </script>
    
  </body>
</html>