CREATE TABLE users (
	user_id INT	NOT NULL CONSTRAINT,
	username VARCHAR (45) NOT NULL,
	PRIMARY KEY (user_id)
);

CREATE TABLE speaker (
	speaker_id INT NOT NULL CONSTRAINT,
	speaker_name VARCHAR (45) CONSTRAINT NOT NULL,
	PRIMARY KEY (speaker_id)
);

CREATE TABLE conference_session (
	conference_session_id INT NOT NULL CONSTRAINT,
	session_date date CONSTRAINT session_date NOT NULL,
	session_time INT CONSTRAINT session_time NOT NULL,
	PRIMARY KEY (conference_session_id)
);

CREATE TABLE speaker_session (
	speaker_session_id INT NOT NULL CONSTRAINT,
	speaker_id INT CONSTRAINT speaker_id NOT NULL, 
	session_id INT CONSTRAINT session_id NOT NULL,
	PRIMARY KEY (speaker_session_id),
	FOREIGN KEY (speaker_id) REFERENCES speaker(speaker_id),
	FOREIGN KEY (session_id) REFERENCES conference_session(conference_session_id)
);

CREATE TABLE notes (
	note_id INT NOT NULL CONSTRAINT,
	speaker_session INT CONSTRAINT speaker_session NOT NULL,
	conference_session INT CONSTRAINT conference_session NOT NULL,
	note_content VARCHAR (500) CONSTRAINT note_content NOT NULL,
	user_id INT CONSTRAINT user_id NOT NULL,
	PRIMARY KEY (note_id),
	FOREIGN KEY (speaker_session) REFERENCES speaker_session(speaker_session_id),
	FOREIGN KEY (conference_session) REFERENCES conference_session(conference_session_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
);

SELECT * FROM users;

INSERT INTO users VALUES ('001', 'Adrian Yim');

INSERT INTO speaker (speaker_id, speaker_name) 
	VALUES 	(1, 'Ulisses Soares'),
			(2, 'Jeffrey R. Holland'),
			(3, 'Russell M. Nelson');

INSERT INTO conference_session (conference_session_id, session_date, session_time) 
	VALUES 	(01, '');

INSERT INTO speaker_session VALUES ();