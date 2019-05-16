CREATE TABLE users (
	user_id int CONSTRAINT,
	username varchar(45) CONSTRAINT username NOT NULL,
	PRIMARY KEY (user_id)
    );

CREATE TABLE notes (
	note_id int CONSTRAINT,
	speaker_session int CONSTRAINT speaker_session NOT NULL,
	conference_session int CONSTRAINT conference_session NOT NULL,
	note_content varchar(500) CONSTRAINT note_content NOT NULL,
	user_id int CONSTRAINT user_id NOT NULL
	PRIMARY KEY (note_id),
	FOREIGN KEY (speaker_session) REFERENCES speaker_session(speaker_session_id),
	FOREIGN KEY (conference_session) REFERENCES conference_session(conference_session_id),
	FOREIGN KEY (user_id) REFERENCES users(user_id)
    );


CREATE TABLE speaker (
	speaker_id int CONSTRAINT,
	speakername varchar(45) CONSTRAINT speakername NOT NULL,
	PRIMARY KEY (speaker_id)
    );

CREATE TABLE conference_session (
	conference_session_id int CONSTRAINT,
	session_date date CONSTRAINT session_date NOT NULL,
	session_time int CONSTRAINT session_time NOT NULL,
	PRIMARY KEY (conference_session_id),
    );

CREATE TABLE speaker_session (
	speaker_session_id int CONSTRAINT,
	speaker_id int CONSTRAINT speaker_id NOT NULL, 
	session_id int CONSTRAINT session_id NOT NULL,
	PRIMARY KEY (speaker_session_id),
	FOREIGN KEY (speaker_id) REFERENCES speaker(speaker_id);
	FOREIGN KEY (session_id) REFERENCES conference_session(conference_session_id);
    );