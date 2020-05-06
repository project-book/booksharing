CREATE TABLE admin (
  user varchar(30) PRIMARY KEY,
  password varchar(30) NOT NULL
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
   
CREATE TABLE ebook (
  titolo varchar(30) NOT NULL,
  autore varchar(30) NOT NULL,
  editore varchar(30) NOT NULL,
  genere varchar(20) NOT NULL,
  anno smallint(6) NOT NULL,
  prezzo_punti varchar(40) NOT NULL,
  PRIMARY KEY (titolo,autore)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE indirizzo (
  via varchar(40) NOT NULL,
  civico varchar(5) NOT NULL,
  cap smallint(6) NOT NULL,
  comune varchar(20) NOT NULL,
  provincia varchar(20) NOT NULL,
  PRIMARY KEY (via,civico,cap)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE registrato (
  user varchar(20) PRIMARY KEY,
  password varchar(20) NOT NULL,
  nome varchar(15) NOT NULL,
  cognome varchar(15) NOT NULL,
  email varchar(50) NOT NULL,
  via varchar(40) NOT NULL,
  civico varchar(5) NOT NULL,
  cap smallint(6) NOT NULL,
  saldo int(100) NOT NULL,
  FOREIGN KEY (via,civico,cap) references indirizzo(via,civico,cap) on update cascade on delete cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE libro_cartaceo ( 
  titolo varchar(30) NOT NULL, 
  autore varchar(30) NOT NULL, 
  editore varchar(30) NOT NULL, 
  genere varchar(20) NOT NULL, 
  anno smallint(6) NOT NULL, 
  condizione varchar(40) NOT NULL, 
  user varchar(20) NOT NULL, 
  PRIMARY KEY (titolo,autore,user), 
  FOREIGN KEY (user) references registrato (user) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE proposta (
  id int(20) PRIMARY KEY,
  proponente varchar(20) NOT NULL,
  ricevente varchar(20) NOT NULL,
  titolo_libro varchar(30) NOT NULL,
  autore_libro varchar(30) NOT NULL,
  titolo_prop varchar(30) NOT NULL,
  autore_prop varchar(30) NOT NULL,
  FOREIGN KEY (titolo_libro,autore_libro,ricevente) references libro_cartaceo (titolo,autore,user) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (titolo_prop,autore_prop,proponente) references libro_cartaceo (titolo,autore,user) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE valutazione (
  id smallint(5) PRIMARY KEY,
  commento varchar(100) NOT NULL,
  voto smallint(6) NOT NULL,
  valutante varchar(20) NOT NULL,
  valutato varchar(20) NOT NULL,
  FOREIGN KEY (valutante) references registrato(user) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (valutato) references registrato(user) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

