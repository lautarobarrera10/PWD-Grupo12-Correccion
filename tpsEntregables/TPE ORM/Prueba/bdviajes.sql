CREATE DATABASE bdviajes; 
USE bdviajes;
CREATE TABLE persona(
    pnumdoc bigint PRIMARY KEY,
    pnombre varchar(150),
    papellido varchar(150),
    ptelefono bigint
)ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE empresa(
    idempresa bigint AUTO_INCREMENT,
    enombre varchar(150),
    edireccion varchar(150),
    PRIMARY KEY (idempresa)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE responsable (
    rnumeroempleado bigint AUTO_INCREMENT,
    rnumerolicencia bigint,
    rnumdoc bigint,
    PRIMARY KEY (rnumeroempleado),
    FOREIGN KEY (rnumdoc) REFERENCES persona(pnumdoc)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
	
CREATE TABLE viaje (
    idviaje bigint AUTO_INCREMENT, /* en la clase Viaje el atributo es codigo */
	vdestino varchar(150),
    vmaxpasajeros bigint,
	idempresa bigint,
    rnumeroempleado bigint,
    vimporte float, /* en la clase Viaje el atributo es costo */
    PRIMARY KEY (idviaje),
    FOREIGN KEY (idempresa) REFERENCES empresa (idempresa) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (rnumeroempleado) REFERENCES responsable (rnumeroempleado)
    ON UPDATE CASCADE
    ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT = 1;
	
    CREATE TABLE pasajero ( 
    idpasajero bigint AUTO_INCREMENT, 
    pdocumento bigint,
    numasiento bigint,
    numticket bigint,
    idviaje bigint, 
    PRIMARY KEY (idpasajero), 
    FOREIGN KEY (pdocumento) REFERENCES persona (pnumdoc)  ON UPDATE CASCADE
    ON DELETE CASCADE,
    FOREIGN KEY (idviaje) REFERENCES viaje (idviaje)  ON UPDATE CASCADE
    ON DELETE CASCADE
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*     CREATE TABLE pasajeroconnecesidades ( 
    idpasajero bigint AUTO_INCREMENT, /*CONSULTAR */
    sillaruedas boolean,
    comida boolean,
    asistencia boolean,
    PRIMARY KEY (idpasajero), 
    FOREIGN KEY (idpasajero) REFERENCES pasajero (idpasajero)  ON UPDATE CASCADE
    ON DELETE CASCADE;
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    CREATE TABLE pasajerovip ( 
    idpasajero bigint AUTO_INCREMENT, 
    numviajerofrecuente bigint,
    cantmillas bigint,
    PRIMARY KEY (idpasajero), 
    FOREIGN KEY (idpasajero) REFERENCES pasajero (idpasajero) ON UPDATE CASCADE
    ON DELETE CASCADE;
    )ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
    CREATE TABLE pasajeroestandar ( 
    idpasajero bigint AUTO_INCREMENT, 
    PRIMARY KEY (idpasajero), 
    FOREIGN KEY (idpasajero) REFERENCES pasajero (idpasajero) ON UPDATE CASCADE
    ON DELETE CASCADE;
    )ENGINE=InnoDB DEFAULT CHARSET=utf8; */
    

