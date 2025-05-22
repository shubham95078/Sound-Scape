// Define a class for the Playlist
class Playlist {
    constructor(name) {
      this.name = name;
      this.songs = [];
    }
  
    addSong(song) {
      this.songs.push(song);
    }
  
    removeSong(song) {
      const index = this.songs.indexOf(song);
      if (index !== -1) {
        this.songs.splice(index, 1);
      }
    }
  }
  
  // Define a class for the Music Streaming Website
  class MusicStreamingWebsite {
    constructor() {
      this.playlists = [];
    }
  
    createPlaylist(name) {
      const playlist = new Playlist(name);
      this.playlists.push(playlist);
      return playlist;
    }
  
    addSongToPlaylist(song, playlist) {
      playlist.addSong(song);
    }
  
    removeSongFromPlaylist(song, playlist) {
      playlist.removeSong(song);
    }
  }
  
  // Usage example:
  const website = new MusicStreamingWebsite();
  
  // Create a playlist
  const playlist1 = website.createPlaylist("My Playlist");
  
  // Add songs to the playlist
  playlist1.addSong("Song 1");
  playlist1.addSong("Song 2");
  playlist1.addSong("Song 3");
  
  // Create another playlist
  const playlist2 = website.createPlaylist("Favorites");
  
  // Add songs to the second playlist
  playlist2.addSong("Song 4");
  playlist2.addSong("Song 5");
  
  // Remove a song from the first playlist
  playlist1.removeSong("Song 2");
  
  console.log(playlist1.songs); // Output: ["Song 1", "Song 3"]
  console.log(playlist2.songs); // Output: ["Song 4", "Song 5"]