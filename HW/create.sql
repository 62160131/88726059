CREATE TABLE Artist (
    NameArtist varchar(100) NOT NULL,
    Member INT NOT NULL,
    PRIMARY KEY (NameArtist)
);

CREATE TABLE Album (
    NameAlbum varchar(100) NOT NULL,
    ReleaseYear YEAR NOT NULL,
    Photo_of_Album VARCHAR(100) NOT Null,
    NameArtist varchar(100) NOT NULL,
    StyleSong varchar(100) NOT NULL,
    PRIMARY KEY (NameAlbum)
);

CREATE TABLE Song (
    NameSong varchar(200 NOT NULL,
    Lengths TIME NOT Null,
    Lyric VARCHAR(3000) NOT Null,
    NameAlbum varchar(100) NOT NULL,
    NameArtist varchar(100) NOT NULL,
    StyleSong varchar(100) NOT NULL,
    PRIMARY KEY (NameSong)
   
);

CREATE TABLE Style (
    StyleSong varchar(100) NOT NULL,
    (StyleSong)
);